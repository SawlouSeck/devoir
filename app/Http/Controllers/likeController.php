<?php

namespace App\Http\Controllers;
use App\Models\like;
use App\Models\User;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class likeController extends Controller
{
    public function likeCandidat(Request $request, Candidat $candidat, $type)
{
    // Vérifier si l'utilisateur a déjà liké ou disliké le candidat
    $existingLike = Like::where('candidat_id', $candidat->id)
                        ->where('user_id', Auth::id())
                        ->first();

    // Si l'utilisateur a déjà liké ou disliké le candidat, supprimer le like existant
    if ($existingLike) {
        $existingLike->delete();
    }

    // Créer un nouveau like ou dislike en fonction du type de la requête
    if ($type === 'like' || $type === 'dislike') {
        $like = new Like([
            'candidat_id' => $candidat->id,
            'user_id' => Auth::id(),
            'type' => $type,
        ]);

        $like->save();

        // Incrémenter le nombre total de likes de l'utilisateur
        $user = User::find(Auth::id());
        $user->like_count = $user->likes()->count(); // Utilisez la relation pour compter les likes
        $user->save();
    }

    // Obtenir le nombre de likes et dislikes pour le candidat
    $likesCount = $candidat->likes()->where('type', 'like')->count();
    $dislikesCount = $candidat->likes()->where('type', 'dislike')->count();

    // Retourner les compteurs sous forme de réponse JSON
    return response()->json([
        'likes' => $likesCount,
        'dislikes' => $dislikesCount,
        'user_like_count' => auth()->user()->like_count,
    ]);
}

}
