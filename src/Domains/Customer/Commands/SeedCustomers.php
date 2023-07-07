<?php

declare (strict_types = 1);

namespace Domains\Customer\Commands;

use Illuminate\Console\Command;
use Domains\Customer\Models\Customer;

class SeedCustomers extends Command
{
    protected $signature = 'seed:customers
                            {count=1 : the count of the cusomers to seed}';

    protected $description = 'Seed the database with customers';

    public function handle(): void
    {
        $this->comment("Seeding customers..");
        Customer::factory($this->argument('count'))->create();
        $this->info('Done!');
    }
}
