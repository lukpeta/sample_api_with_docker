<?php

namespace App\Http\Controllers;

use App\Http\Resources\RepetitionOfNumbersResource;
use App\Http\Resources\ResultByDateResource;
use App\Repositories\Eloquent\Interfaces\{
    PublicationRepositoryInterface,
    ResultRepositoryInterface
};
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function __construct(
        PublicationRepositoryInterface $publicationRepository,
        ResultRepositoryInterface      $resultRepository

    )
    {
        $this->publicationRepository = $publicationRepository;
        $this->resultRepository = $resultRepository;
    }

    /**
     * @param string $date
     * @return ResultByDateResource|string
     */
    public function resultByDate(string $date)
    {
        try {
            Carbon::parse(str_replace('.', '-', $date));
            return new ResultByDateResource($this->publicationRepository->findBy('date', $date, ['*'], ['results']));
        } catch (\Exception $e) {
            echo 'invalid date format';
        }
    }

    /**
     * @param int $number
     * @return RepetitionOfNumbersResource
     */
    public function repetitionOfNumbers(int $number)
    {
        return new RepetitionOfNumbersResource($this->resultRepository->findAllBy('number', $number, ['*'], 'id', 'asc', ['publication']));
    }
}
