<?php

namespace App\Services;

use App\Models\Publication;
use App\Repositories\Eloquent\Interfaces\PublicationRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\ResultRepositoryInterface;

class ImporterLottoService
{

    public function __construct(PublicationRepositoryInterface $publicationRepository,
                                ResultRepositoryInterface      $resultRepository)
    {
        $this->publicationRepository = $publicationRepository;
        $this->resultRepository = $resultRepository;
    }

    /**
     * @param string|null $date
     * @return string
     */
    public function import(string $date = null): string
    {
        $content = file_get_contents("http://www.mbnet.com.pl/dl_plus.txt");
        $lines = explode("\n", $content);

        $result = [];

        foreach ($lines as $line) {
            if ($line != "") {
                $parts = explode(" ", $line);

                if ($date != null && trim($parts['1']) != $date) {
                    continue;
                }

                $resultNumbers = [];
                $numbers = explode(",", trim($parts[2]));
                $publication = $this->save(trim($parts[1]));

                foreach ($numbers as $number) {
                    $data = [
                        'publication_id' => $publication->id,
                        'number' => $number
                    ];
                    $this->saveResults($data);
                }
            }
        }
        return 'successful import';
    }


    /**
     * @param string $publicationDate
     * @return Publication
     */
    private function save(string $publicationDate): Publication
    {
        return $this->publicationRepository->create(['date' => $publicationDate]);
    }

    /**
     * @param array $items
     * @return void
     */
    private function saveResults(array $items): void
    {
        $this->resultRepository->create($items);
    }
}
