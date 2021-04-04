<?php 

namespace App\Services;

use PDF;

class PdfService
{
	/*
		PARAMETER : 
		- $view : Halaman view
		- $data : Passing data
		- $filename : Nama file hasil export pdf
	*/
	public function export($view=null,$data=null,$filename='tabungan')
	{
		$pdf = PDF::loadView($view,$data);
    	return $pdf->download($filename.'.pdf');
	}
	
	/*
		PARAMETER : 
		- $view : Halaman view
		- $data : Passing Data / Mengirim data
	*/
	public function print($view=null,$data=null)
	{
		$pdf = PDF::loadView($view,$data);
    	return $pdf->stream();
	}
}