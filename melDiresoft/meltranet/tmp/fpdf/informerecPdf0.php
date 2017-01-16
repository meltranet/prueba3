<?php 

	include '../../meltranet.php';

	require('fpdf.php');

class PDF extends FPDF
{

	var $dFecha;

//Cabecera de página
function Header() {

	$this->Image('../../../jpg/rptMeltranet182x54.jpg',8,6,47,36);
  	$this->Ln(35);	
  
	$this->SetFont("Arial","B",10);
	$this->Cell(180,5,'LIBRO DE ENTRADA Y SALIDA DE HUESPEDES',0,1,'L');
	$this->Cell(180,5,'Del  '.cFecha($this->dFecha),0,1,'L');

  $this->Ln(5);
}

//Hacer que sea multilinea sin que haga un salto de linea
var $widths;
var $aligns;
var $celdas;
var $ancho;
var $nro_ocs;
function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
} 
function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
} 
// Marco de la celda
function Setceldas($cc)
{
   
    $this->celdas=$cc;
} 
// Ancho de la celda
function Setancho($aa)
{
    $this->ancho=$aa;
}
function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
} 
function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
} 

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        //$this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,$this->ancho[$i],$data[$i],$this->celdas[$i],$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}
//fin

function inf0($taInf) {

			$this->SetFont("Arial","I",9);
			
			$this->SetWidths(array(8,18,58,22,12,10,10,24,24,20,20,20,20));
			$this->SetAligns(array('L','L','L','L','L','L','L','L','L','L','L','L','L'));
       		$this->Setceldas(array(0,0,0,0,0,0,0,0,0,0,0,0,0));
			$this->Setancho(array(5,5,5,5,5,5,5,5,5,5,5,5,5));
   		   	$this->Row(array(
				$taInf['iFila'],
				$taInf['cNumero'],
				substr($taInf['cConcepto'],0,28),
				$taInf['cHuespedIdentidad'],
				$taInf['cHabitacionNumero'],
				$taInf['iPersona'],
				substr($taInf['cHuespedCivil'],0,1),
				substr($taInf['cHuespedNacionalidad'],0,9),
				substr($taInf['cHuespedProfesion'],0,9),
				substr($taInf['cCiudadOrigen'],0,8),
				substr($taInf['cCiudadDestino'],0,8),
				$taInf['dLlegada'],
				$taInf['dPartida']));

}
function inf1($taInf) {
			$this->SetFont("Arial","I",9);

			$this->Cell(8,6,'',1,0,'L');
			$this->Cell(18,6,'',1,0,'L');
			$this->Cell(58,6,'Total personas',1,0,'L');
			$this->Cell(22,6,'',1,0,'L');
			$this->Cell(12,6,'',1,0,'L');
			$this->Cell(10,6,$taInf['iPersona'],1,0,'L');
			$this->Cell(10,6,'',1,0,'L');
			$this->Cell(24,6,'',1,0,'L');
			$this->Cell(24,6,'',1,0,'L');
			$this->Cell(20,6,'',1,0,'L');
			$this->Cell(20,6,'',1,0,'L');
			$this->Cell(20,6,'',1,0,'L');
			$this->Cell(20,6,'',1,1,'L');
}
function imprimir_tabla ()
{
			$this->SetFont("Arial","I",9);

			$this->Cell(8,6,'',1,0,'L');
			$this->Cell(18,6,'Registro',1,0,'L');
			$this->Cell(58,6,'Apellidos y Nombres',1,0,'L');
			$this->Cell(22,6,'Documento',1,0,'L');
			$this->Cell(12,6,'Hab.',1,0,'L');
			$this->Cell(10,6,'Per.',1,0,'L');
			$this->Cell(10,6,'E. C.',1,0,'L');
			$this->Cell(24,6,'Nacionalidad',1,0,'L');
			$this->Cell(24,6,'Profesion',1,0,'L');
			$this->Cell(20,6,'Origen',1,0,'L');
			$this->Cell(20,6,'Destino',1,0,'L');
			$this->Cell(20,6,'Entrada',1,0,'L');
			$this->Cell(20,6,'Salida',1,1,'L');


		$lcPro = "CALL informerecRec0(1,".
			cdbSes('dFecha').",".
			idbSes('idMelAcceso').");";

		$loInf = dbResIni($lcPro, 0);

		while ($laInf = aResCar($loInf)) {
			switch ($laInf["iInf"]) {
				case 0:
					$this->inf0($laInf);
					break;
				case 1:
					$this->inf1($laInf);
					break;
				default: $liError = 1;
			}
		}

}

}

$pdf=new PDF('L','mm','letter');

$pdf->dFecha = sesVarDef('dFecha');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->imprimir_tabla();

$pdf->Output();
?>