<?php

declare (strict_types = 1);

namespace Domains\Vendor\Commands;

use Domains\Vendor\Models\Business;
use Domains\Vendor\Models\Category;
use Domains\Vendor\Models\Vendor;
use Illuminate\Console\Command;

class SeedVendors extends Command
{
    protected $signature = 'seed:vendors
                            {count=1 : the count of the cusomers to seed}
                            {--b|businesses=0 : count of businesses assigned for each vendor}
                            {--c|categories=0 : count of categories assigned for each business}';

    protected $description = 'Seed the database with vendors';

    public function handle(): void
    {
        $this->comment("Seeding vendors..");

        Vendor::factory($this->argument('count'))->has(
            factory: Business::factory( count: $this->option('businesses'))->has(
                factory: Category::factory( count: $this->option('categories'))
            )
        )->create();

        $this->info('Done!');
    }
}
