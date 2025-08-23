<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Image;

class ProcessStoredImageJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    private $relative_path;
    private $user_id;
    public function __construct($relative_path, $user_id)
    {
        $this->relative_path = $relative_path;
        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
      try{
        $image = Image::create([
            'path'=>$this->relative_path,
            'user_id'=>$this->user_id,
        ]);
        $image->scale_down(500);
      }catch(\Throwable $th){
        echo $th->getMessage().PHP_EOL;
      }
    }
}
