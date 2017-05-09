<?php

namespace Blog\Console\Commands;

use Illuminate\Console\Command;
use Blog\post;

use DateTime;
use Carbon\Carbon;
use Blog\Mail\WelcomeToDemoproject;

class PublishPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Un published post published by date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        // $this->status = $drip;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $now = new DateTime();
        // $this->info();
    //     $email= new WelcomeToDemoproject(new Blog\User(['username'=>'Sharif']));
    // Mail::to('sabbirh87@gmail.com')->send($email);
        $posts = Post::all();
        $now = Carbon::now();
            foreach($posts->chunk(3) as $data){
                foreach($data as $post){
                    if($post->status==0){
                        if($now->gt(Carbon::parse($post->publish_at)) ){
    // $this->info('Publisheable post are Publish successfully');
                        $post = Post::find($post->id);
                        $post->status ='1';
                        $post->save();
                            if ($post->save()) {                        
                                $this->info($post->title.' successfully Publish');
                            }

                        }else{
                                $this->info($post->title.' are not publishable post');

                        }
                    }
                }
            }
    }
}
