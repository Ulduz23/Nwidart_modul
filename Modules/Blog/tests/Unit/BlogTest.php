<?php

namespace Modules\Blog\tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\Blog\Models\Blog;


class BlogTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function it_can_be_created()
  {
    $blogPost = new Blog();
    $blogPost->title_az = 'Azeri başlık';
    $blogPost->title_en = 'English title';
    $blogPost->title_ru = 'Русский заголовок';
    $blogPost->desc_az = 'Azeri açıklaması';
    $blogPost->desc_en = 'English description';
    $blogPost->desc_ru = 'Русское описание';
    $blogPost->image = '/images/blog/post.jpg';

    $blogPost->save();

    $this->assertEquals('Azeri başlık', $blogPost->title_az);
    $this->assertEquals('English title', $blogPost->title_en);
    $this->assertEquals('Русский заголовок', $blogPost->title_ru);
    $this->assertEquals('Azeri açıklaması', $blogPost->desc_az);
    $this->assertEquals('English description', $blogPost->desc_en);
    $this->assertEquals('Русское описание', $blogPost->desc_ru);
    $this->assertEquals('/images/blog/post.jpg', $blogPost->image);
  }
}
