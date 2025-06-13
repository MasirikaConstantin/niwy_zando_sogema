<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empreint;
use App\Models\Vendeur;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class EmpreintController extends Controller
{

    public function create($id)
    {
        $vendeur = Vendeur::findOrFail($id);
        return view('empreintes.create', compact('vendeur'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'finger' => 'required|in:doigt_droite1,doigt_droite2,doigt_droite3,doigt_droite4,doigt_droite5,doigt_gauche1,doigt_gauche2,doigt_gauche3,doigt_gauche4,doigt_gauche5',
            'image_data' => 'required|string',
            'raw_data' => 'required|string',
            'vendeur_id' => 'required|exists:vendeurs,id'
        ]);

        try {
            // Create directory if not exists
            $directory = "empreintes/vendeur_{$request->vendeur_id}";
            Storage::disk('public')->makeDirectory($directory);

            // Process image
            $imageData = $request->image_data;
            $imageContent = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
            
            // Save image
            $filename = "{$request->finger}_" . time() . '.png';
            $imagePath = "$directory/$filename";
            Storage::disk('public')->put($imagePath, $imageContent);

            // Update or create empreint record
            $empreint = Empreint::updateOrCreate(
                ['vendeur_id' => $request->vendeur_id],
                [
                    $request->finger => $request->raw_data,
                    'save_by_id' => auth()->id()
                ]
            );

            return response()->json([
                'success' => true,
                'message' => 'Empreinte enregistrée avec succès',
                'finger' => $request->finger
            ]);

        } catch (\Exception $e) {
            \Log::error("Erreur enregistrement empreinte: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'enregistrement: ' . $e->getMessage()
            ], 500);
        }
    }
}
