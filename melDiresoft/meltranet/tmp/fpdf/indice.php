<?php 
	include '../../../../mel/php/mel.php';
	
	require('fpdf.php');

class PDF extends FPDF
{

//Cabecera de página
function Header()
{
	$li = 0;
//	$this->SetFont("Arial","B",10);
//	$this->Image('../../../melSocio/img/jpg/rpt182x54.jpg',8,6,60,15);
//	$this->Cell(180,7, 'recibo de pago', 0, 1, "C");
//   	$this->Image($laEncabezado['imagen_der'],180,6,25,25);
	
//   	$this->Cell(180,7,'Prueba',0,1,"C");
//   	$this->Cell(180,7,'Prueba',0,1,"C");
//   	$this->Cell(180,7,'Prueba',0,1,"C");
	
//	$date1=date('d/m/Y');
//	$date2=date('h:i a');
//	$this->SetFont("Arial","B",10);
//	$this->Cell(180,5,utf8_decode('COMPROMISOS PRESUPUESTARIOS'),0,0,'C');
//	$this->Cell(0,5,'FECHA: '.$date1,0,1,'R');
//	$this->Cell(180,5,utf8_decode('Por Número de Control'),0,0,'C');
//	$this->Cell(0,5,'HORA: '.$date2,0,1,'R');
//	$this->Cell(180,5,utf8_decode('Hasta el : '. $_GET['dHasta']),0,1,'C');

//  $this->Ln(5);

//	$this->tituloEnc();
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


function imprimir_tabla ($taFila)
{
	$liMontoX = 12; $liMontoY = 10;
	$liEntidadX = 10; $liEntidadY = 8;
	$liCantidadX = 10; $liCantidadY = 10;
	$liCiudadX = 10; $liCiudadY = 10; $liDiaX = 10; $liAnoX = 18;
	$liValidoX = 10;  $liValidoY = 16;
	$liEndorsoX = 10; $liEndorsoY = 10;


	$this->SetFont('Arial','B',10);
	
	$this->Ln(54+$liMontoY);
	$this->Cell(85+$liMontoX,3,'',0,0,'L');
	$this->Cell(136,3,'',0,0,'L');
	$this->Cell(0,3,'**'.number_format($taFila["yMonto"],2,',','.').'**',0,1,'L');

	$this->Ln(4+$liEntidadY);
	$this->Cell(85+$liMontoX,3,'',0,0,'L');
	$this->Cell(14+$liEntidadX,3,'',0,0,'L');
	$this->Cell(0,3,utf8_decode(cdb($taFila["cBeneficiarioNombre"])),0,1,'L');
	
	$this->Ln(-7+$liCantidadY);
	$this->Cell(85+$liMontoX,3,'',0,0,'L');
	$this->Cell(14+$liCantidadX,3,'',0,0,'L');
	$this->Cell(0,3,utf8_decode(cdb($taFila["cMonto"])),0,1,'L');

	$this->Ln($liCiudadY);
	$this->Cell(85+$liMontoX,3,'',0,0,'L');
	$this->Cell($liCiudadX,3,'',0,0,'L');
	$this->Cell(10+$liDiaX,3,$taFila["cRealizadoLugar"],0,0,'L');
	$this->Cell(36+$liAnoX,3,$taFila["cDia"].' / '.$taFila["cMes"],0,0,'L');
	$this->Cell(0,3,$taFila["cAno"],0,1,'L');

	$this->Ln(4+$liValidoY);
	$this->Cell(85+$liMontoX,3,'',0,0,'L');
	$this->Cell(90+$liValidoX,3,'',0,0,'L');
	$this->Cell(0,3,utf8_decode(cdb($taFila["cEndorso"])),0,1,'L');

	$this->Ln(-9+$liEndorsoY);
	$this->Cell(85+$liMontoX,3,'',0,0,'L');
	$this->Cell(90+$liEndorsoX,3,'',0,0,'L');
	$this->Cell(0,3,utf8_decode(cdb($taFila["cValidoTexto"])),0,1,'L');
}

}

	$lcPro = "CALL movimientoRec(3,0,0,'','',0,".
		idbSes('idMovimiento').",".
		idbSes('idMelAcceso').");";
//exit($lcPro);
	$laReg = dbResFilIni($lcPro, 0);

$pdf=new PDF('L','mm','letter');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->imprimir_tabla($laReg);

$pdf->Output();
?>