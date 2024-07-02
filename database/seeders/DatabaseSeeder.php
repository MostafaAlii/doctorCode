<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\{App,File};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        env('APP_ENV') === 'local' ? $this->tenantSeeders() : $this->landlordSeeder();
    }

    private function tenantSeeders() {
        $this->seederTenantCalling();
    }

    private function landlordSeeder() {
        $this->seederTenantCalling();
    }

    /*private function seederCalling() {
        $seederFiles = File::allFiles(database_path('seeders'));
        $seederFileArray = [];
        foreach ($seederFiles as $seederFile) {
            if ($seederFile->getBasename() !== 'DatabaseSeeder.php') 
                $seederFileArray[] = $seederFile;
        }
        usort($seederFileArray, function ($time_a, $time_b) {
            return filectime($time_a->getRealPath()) <=> filectime($time_b->getRealPath());
        });
        
        foreach ($seederFileArray as $seederFile) {
            $seederClassNamespace = 'Database\\Seeders\\' . $seederFile->getBasename('.php');
            if (class_exists($seederClassNamespace)) 
                $this->call($seederClassNamespace);
        }
    }*/

    private function seederTenantCalling() {
        $seederFiles = File::allFiles(database_path('seeders' . DIRECTORY_SEPARATOR . 'tenants'));
        $seederFileArray = [];
        foreach ($seederFiles as $seederFile) {
            //if ($seederFile->getBasename() !== 'DatabaseSeeder.php') 
            $seederFileArray[] = $seederFile;
        }
        usort($seederFileArray, function ($time_a, $time_b) {
            return filectime($time_a->getRealPath()) <=> filectime($time_b->getRealPath());
        });
        
        foreach ($seederFileArray as $seederFile) {
            $seederClassNamespace = 'Database\\Seeders\\Tenant' . $seederFile->getBasename('.php');
            if (class_exists($seederClassNamespace)) 
                $this->call($seederClassNamespace);
        }
    }

    private function seederLandlordCalling() {
        $seederFiles = File::allFiles(database_path('seeders' . DIRECTORY_SEPARATOR . 'landlord'));
        $seederFileArray = [];
        foreach ($seederFiles as $seederFile) {
            //if ($seederFile->getBasename() !== 'DatabaseSeeder.php') 
            $seederFileArray[] = $seederFile;
        }
        usort($seederFileArray, function ($time_a, $time_b) {
            return filectime($time_a->getRealPath()) <=> filectime($time_b->getRealPath());
        });
        
        foreach ($seederFileArray as $seederFile) {
            $seederClassNamespace = 'Database\\Seeders\\Landlord' . $seederFile->getBasename('.php');
            if (class_exists($seederClassNamespace)) 
                $this->call($seederClassNamespace);
        }
    }
}
