<?php
namespace App\Http\Controllers;

use App\Models\Product; // Import du modèle Product
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Récupérer tous les produits
        $products = Product::all();

        // Retourner la vue 'products.index' avec les produits
        return view('products.index', compact('products'));
    }
}

?>