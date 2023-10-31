<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\RedeNeuralController;

class ListData extends Command
{
    protected $signature = 'list:data';

    protected $description = 'Command description';

    protected $redeNeural;


    public function __construct(RedeNeuralController $redeNeural)
    {
        parent::__construct();
        $this->redeNeural = $redeNeural;
    }

    public function handle()
    {
        $this->redeNeural->trainingCsv();
    }
}
