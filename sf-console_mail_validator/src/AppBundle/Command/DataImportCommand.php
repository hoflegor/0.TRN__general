<?php
// src/AppBundle/Command/CreateUserCommand.php
namespace AppBundle\Command;

use AppBundle\Entity\Mails;
use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Reader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Style\SymfonyStyle;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;


class DataImportCommand extends Command
{

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();

        $this->em = $em;

    }

    protected function configure()
    {
        $this
            ->setName('import')
            ->addArgument('filename', InputArgument::REQUIRED, 'pass the filename')
            ->setDescription('Imports data from CSV file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $inOut = new SymfonyStyle($input, $output);

        $inOut->title('Importing data...');


        $reader = Reader::createFromPath('./src/AppBundle/Data/'.$input->getArgument('filename'));

        $results = $reader->fetchAll();

        $countTrueMails = 0;
        $countFalseMails = 0;

        $fileFalseName = 'false-mails_'.date('Y-m-d_h-i-s').".csv";
        $fileTrueName = 'true-mails_'.date('m-d-Y_h-i-s').".csv";


        foreach ($results as $row) {

            $mailRecruit = $row[0];

            $validator = new EmailValidator();

            if ($validator->isValid($mailRecruit, new RFCValidation())) {
                $countTrueMails++;


//                Zapis do bazy (jeśli mail nie jest już w bazie)


                $entity = $this->em->getRepository('AppBundle:Mails')->findOneBy([
                    'mail' =>$mailRecruit
                ]);

                if ($entity == null){
                    $mail = new Mails();
                        $mail->setMail(trim($mailRecruit));

                    $this->em->persist($mail);
                    $this->em->flush();

                    $inOut->comment($mailRecruit . ' saved in db');

                }
                else{
                    $inOut->comment($mailRecruit . ' alredy exist');
                }

//         Plik z poprawnymi mailami
                $file = fopen(__DIR__.'\\..\\Data'."\\$fileTrueName", 'a');

                fwrite($file, $mailRecruit.PHP_EOL);

                fclose($file);

            } else {

                $countFalseMails++;

//            Plik z błędnymi mailami
                $file = fopen(__DIR__.'\\..\\Data'."\\$fileFalseName", 'a');

                fwrite($file, $mailRecruit.PHP_EOL);

                fclose($file);

            }

        }

        $fileName = 'summary_'.date('Y-m-d_h-i').".txt";

        $file = fopen(__DIR__.'\\..\\Data'."\\$fileName", 'a');

        fwrite(
            $file,
            'PODSUMOWANIE'.PHP_EOL.PHP_EOL.
            "Ilość sprawdzonych adresów mailowych = ".($countTrueMails + $countFalseMails).PHP_EOL.
            "Ilość prawidłowych adresów mailowcych = $countTrueMails".PHP_EOL.
            "Ilość błędnych adresów mailowcych = $countFalseMails".PHP_EOL.PHP_EOL.
            "DZIĘKUJĘ ZA ZABAWĘ Z KODEM I (MAM NADZIEJĘ), DO ZOBACZENIA W PRACY !!!!"
            .PHP_EOL.
            "SERDECZNIE POZDRAWIAM !!!!".PHP_EOL.
            "}:->"
        );

        fclose($file);

        $inOut->success("Import Done. Scooby-Dooby-Doo!");
    }
}