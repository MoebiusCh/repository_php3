<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Events\CategoryDeleting;

class HandleCategoryDeletion
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CategoryDeleting $event)
    {
        $category = $event->category;
        $action = $event->action;
        $defaultCategoryId = $event->defaultCategoryId;
        DB::transaction(function () use ($category, $action, $defaultCategoryId) {
            if ($action === 'move') {
                // Move all products to the default category
                Product::where('category_id', $category->id)->update(['category_id' => $defaultCategoryId]);
            } elseif ($action === 'delete') {
                // Delete all products in this category
                Product::where('category_id', $category->id)->delete();
            }
            // Now delete the category
            $category->delete();
        });
    }
}
