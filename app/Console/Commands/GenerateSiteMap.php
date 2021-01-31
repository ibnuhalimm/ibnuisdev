<?php

namespace App\Console\Commands;

use App\Models\Blog\Post;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        $posts = Post::status(Post::STATUS_PUBLISH)->get();

        foreach ($posts as $post) {
            $sitemap->add(Url::create("{$post->slug}"));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        return 0;
    }
}
