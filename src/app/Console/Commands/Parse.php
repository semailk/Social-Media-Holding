<?php

namespace App\Console\Commands;

use App\Services\Parse\Product\ParseService;
use Illuminate\Console\Command;

class Parse extends Command
{
    protected $signature = 'parse {model} {searchName?}';

    protected $description = 'Command description';

    private array $allowed = [
        'users',
        'products',
        'posts',
        'recipes'
    ];

    public function handle(): int
    {
        $searchName = $this->argument('searchName');
        $model = $this->argument('model');

        if (
            !in_array($model, $this->allowed)
        ) {
            $this->error('The model can only be: users, products, posts, recipes!');
            return Command::FAILURE;
        }

        $productParseService = new ParseService($model);
        $productParseService->build($searchName);
        $this->info('SUCCESS!:)');

        return Command::SUCCESS;
    }
}
