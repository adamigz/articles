<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\AuthorResource;
use App\Models\Article;
use App\Models\Author;

class ApiController extends Controller
{
    public function getArticle($id) {
        return new ArticleResource(Article::with('authors')->findOrFail($id));
    }

    public function getAllArticlesForAuthor($name_slug) {
        return new AuthorResource(Author::where('fullname_slug', $name_slug)->with('articles')->firstOrFail());
    }

    public function getTopAuthors() {
        // get articles from last week
        $articles = Article::where('created_at', '>=', now()->subWeeks())->with('authors')->get()->pluck('authors');
        // flatten collection with authors
        $authors = $articles->flatten();
        // group them by id
        $authors = $authors->groupBy('id');
        // create empty collection for top Authors
        $topAuthors = collect();
        foreach ($authors as $author) {
            // add to topAuthors
            $topAuthors->push([
                // author object
                'author' => $author[0],
                // amount of articles written by author in last week
                'articles_count' => count($author)
            ]);
        }
        // sort authors from highest amount of articles
        $topAuthors->sortByDesc('articles_amount');
        // get top 3 authors
        $topAuthors->splice(3);

        return $topAuthors->toArray();
    }
}
