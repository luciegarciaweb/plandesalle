<?php

namespace App\Http\Controllers\Admin;

use App\Reference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $references = Reference::paginate(10);
        
        return view('admin/references/index', ['references' => $references]);
    }
   
   /**
     * Display the specified resource.
     *
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */    
    public function show(Reference $reference)
    {
        $reference->update([
            'is_read' => true
        ]);

        return view('admin/references/show', [
            'reference' => $reference            
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reference $reference)
    {
        $reference->delete();

        return redirect()->route('admin.references.index')
            ->with('success', 'Le message a bien été supprimé.');
    }
}
