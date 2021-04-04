<?php 

namespace App\Services;

use Excel;

class ExcelService
{
    /*
        PARAMETER : 
        - $insctanceClass : Instansiasi dari class Export Excel
        - $filename : Nama file hasil export excel
    */
	public function export($instanceClass=null,$filename=null)
	{
		return Excel::download($instanceClass,$filename.'.xlsx');
	}

    /*
        PARAMETER : 
        - $insctanceClass : Instansiasi dari class Import Excel
    */
	public function import($instanceClass=null)
    {
        request()->validate([
        	'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = request()->file('file');
        $filename = rand().$file->getClientOriginalName();
        $file->move('excel',$filename);
        return Excel::import($instanceClass,public_path('excel/'.$filename));        
    }
}