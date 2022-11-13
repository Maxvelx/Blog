<?php
//
//namespace App\Jobs;
//
//use App\Service\Post\PostService;
//use Illuminate\Bus\Queueable;
//use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Foundation\Bus\Dispatchable;
//use Illuminate\Queue\InteractsWithQueue;
//use Illuminate\Queue\SerializesModels;
//
//class StorePostJob implements ShouldQueue
//{
//    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
//
//    public $data;
//    public $service;
//
//    /**
//     * Create a new job instance.
//     *
//     * @return void
//     */
//    public function __construct($data)
//    {
//        $this->data = $data;
//        $this->service = new PostService();
//    }
//
//    /**
//     * Execute the job.
//     *
//     * @return void
//     */
//    public function handle()
//    {
//        $this->service->store($this->data);
//    }
//}
