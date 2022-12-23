<?php

namespace App\Http\Controllers;
use App\Models\Docs;
use App\Models\DocVerification;
use App\Models\DocVersion;
use App\Models\DocText;
use App\Models\Industria;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
class DocController extends Controller
{
    public function createItem($doc_id){
    
        $Items=DocText::where('doc_version_id','=',$doc_id);
        return Inertia::render(
            'Docs/CreateItem',
        [
            'Doc'=>$doc_id,
            'Items'=> $Items,
        ]
        );
    }
    
    public function ItemStore(Request $request)
    {
        $id_indust=session('industria');
        $id_struct=session('structure');
        $doc=Docs::create([
            'ind_id'=>$id_indust,
            'str_id'=>$id_struct,  
        ]);
        $data=  [
            'doc_id'=>$doc->id,
            'name'=>$request->name,
            'shifr'=>$request->shifr,
            'version'=>$request->version,
            'year'=>$request->year,
        ];
        //return $data;
        DocVersion::create($data);
        return redirect('docs.items');
    }
    public function items($doc_id){
    
        $Items=DocText::where('doc_version_id','=',$doc_id);
        return Inertia::render(
            'Docs/Items',
        [
            'Items'=>$Items,
            'doc'=>$doc_id,
        ]
        );
    }
    public function update(Request $request, $doc_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'shifr' => 'required|string|max:10',
            'version' => 'required',
            'year' => 'required',
        ]);
        $docVersionID=DocVersion::where('doc_id','=',$doc_id)->first();
        $docVersion=DocVersion::find($docVersionID['id']);
        $docVersion->name = $request->name;
        $docVersion->shifr = $request->shifr;
        $docVersion->version = $request->version;
        $docVersion->year = $request->year;
        $docVersion->save();
        sleep(1);
        return redirect()->route('docs.index')->with('message', 'Doc Updated Successfully');
    }
    public function edit($id)
    {
       $s=$this->hasSessions();
       $doc=$this->doc_info($id);
        return Inertia::render(
            'Docs/Edit',
            [
                'industr'=>$s['ind'],
                'struct'=>$s['str'],
                'doc'=>$doc,
            ]
        );
    }
       
    public function create(){
        $s=$this->hasSessions();
        return Inertia::render(
            'Docs/Create',
        [
            'industr'=>$s['ind'],
            'struct'=>$s['str'],
        ]
        );
    }
    public function store(Request $request)
    {
        $id_indust=session('industria');
        $id_struct=session('structure');
        $doc=Docs::create([
            'ind_id'=>$id_indust,
            'str_id'=>$id_struct,  
        ]);
        $data=  [
            'doc_id'=>$doc->id,
            'name'=>$request->name,
            'shifr'=>$request->shifr,
            'version'=>$request->version,
            'year'=>$request->year,
        ];
        //return $data;
        DocVersion::create($data);
        return redirect('/docs');
    }
    public function index()
    {
        if(!session()->has('industria')||!session()->has('structure'))  
        return $this->hasSessions();
        else
        $s=$this->hasSessions();
        $docs=$this->all($s['ind'],$s['str']);
        return Inertia::render(
            'Docs/Index',
            [
                'docs'=>$docs,
                'industr'=>$s['ind'],
                'struct'=>$s['str'],
            ]
        );
    }
    public function hasSessions(){ /// выборка из сессий
        if(session()->has('industria'))
           { $id_indust=session('industria');}
        else
          {  return $this->select_otherIndustria();}

        if(session()->has('structure'))
          {  $id_struct=session('structure');}
        else
          {  return $this->select_otherStructure(); } 

        return ['ind'=>$id_indust,'str'=>$id_struct];    
    }
    public function selectSession($id,$type){
        if($type=='industria')
            session(['industria'=>$id]);
        if($type=='structure')
            session(['structure'=>$id]);
        return redirect('/docs');
    }
    public function select_otherIndustria(){
        if(Industria::where('auth_id','=',Auth::id())->count()==0)
            return redirect('/industria/create');
            else
            return Inertia::render(
                'Docs/SelectI',
                [
                    'industrias' => Industria::where('auth_id','=',Auth::id())->get(),

                ]
            );
    }
    public function select_otherStructure(){
        $id_industria=session('industria');
        if( Structure::where('ind_id','=',$id_industria)->count()==0)
            return redirect('/Structure/create');
            else
            return Inertia::render(
                'Docs/SelectS',
                [
                    'structuries' => Structure::where('ind_id','=',$id_industria)->get(),

                ]
            );
    }
    public function doc_info($id){
        $doc=Docs::find($id);
        $version=DocVersion::where('doc_id','=',$id)->first();
        $result=[
            'id'=>$id,
            'version_id'=>$version->id,
            'name'=>$version->name,
            'shifr'=>$version->shifr,
            'version'=>$version->version,
            'year'=>$version->year,
        ];
        return $result;
    }
    public function all($ind_id,$str_id){
        $docs=Docs::where('ind_id','=',$ind_id)->where('str_id','=',$str_id);
        $results=[];
        foreach($docs->get() as $doc){
            $results[]=$this->doc_info($doc->id);
        }
        return $results;
    }
    public function destroy($id)
    {
        if($doc=Docs::find($id)){
            $doc->delete();
            foreach(DocVersion::where('doc_id','=',$id)->get() as $dv){
                $dvv=DocVersion::find($dv->id);
                $dvv->delete();
            }
        }
        return redirect('/docs');
    }
}
