<?php

namespace App\Console\Commands;

use App\Models\Certificate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteFailedFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-failed-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete failed files';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $certificates= Certificate::whereNull('user_id')->whereDate('created_at' , '<', today())->get();
         if($certificates->count() > 0){
             foreach ($certificates as $certificate){
                if(file_exists(public_path($certificate->path)))
                {
                    unlink(public_path($certificate->path));
                }
                 $certificate->delete();
             }
         }

    }
}
