<?php
/*  Controller principal
 *  Funções utilizadas em todas as paginas
 */
class Controller
{

	function __construct()
	{
	}

	//Transofrma data americana para Pt-br
	public function transformDataBr($data)
	{
		$newData = explode('-', $data);
		return $newData[2] . '/' . $newData[1] . '/' . $newData[0];
	}

	function trasnformDataEHora($data){ 
		$data_hora_americana = $data;
		$data_hora = DateTime::createFromFormat('Y-m-d H:i:s', $data_hora_americana);
		$data_hora_brasileira = $data_hora->format('d/m/Y H:i');
	
		return $data_hora_brasileira;
	}

	//Obtem o dia de uma data americana
	public function getDayOnDate($data)
	{
		$result = explode('-', $data);
		return $result[2];
	}

	public function formatName($name)
	{
		return ucwords(mb_strtolower($name, 'UTF-8'));
	}

	public function limitName($name, $limit)
	{
		$arrName = explode(" ", $name);
		$out = "";
		foreach ($arrName as $key => $word) {
			if ($key == $limit) {
				break;
			}
			$out .= $word . " ";
		}
		return $out;
	}

	public function removeAccents($string)
	{
		$string = preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $string);
		return strtolower($string);
	}

	public function formatMoneyBR($value)
	{
		return  'R$' . number_format($value, 2, ",", ".");
	}

	public function formatMoneyUSD($value)
	{
		$rtr = str_replace(",", ".", number_format($value, 2));
		return substr($rtr, 0, -3);
	}

	public function getMonthName($numberMonth)
	{
		$mes[1] = 'Janeiro';
		$mes[2] = 'Fevereiro';
		$mes[3] = 'Março';
		$mes[4] = 'Abril';
		$mes[5] = 'Maio';
		$mes[6] = 'Junho';
		$mes[7] = 'Julho';
		$mes[8] = 'Agosto';
		$mes[9] = 'Setembro';
		$mes[10] = 'Outubro';
		$mes[11] = 'Novembro';
		$mes[12] = 'Dezembro';
		return $mes[$numberMonth];
	}

	//Verifica se um registro está atrasado (está no passado)
	public function isLate($dateBase)
	{
		$dt_atual = date("Y-m-d"); // data atual
		$timestamp_dt_atual 	= strtotime($dt_atual); // converte para timestamp Unix
		$dt_expira = $dateBase; // data de expiração
		$timestamp_dt_expira = strtotime($dt_expira); // converte para timestamp Unix
		// data atual é maior que a data de expiração
		if ($timestamp_dt_atual > $timestamp_dt_expira)
			return true; // atrasado
		else
			return false; //não atrasado
	}

	//Obtem idade baseada na data
	public function getOlder($birthDate)
	{
		$birthDate = $this->transformDataBr($birthDate);
		//explode the date to get month, day and year
		$birthDate = explode("/", $birthDate);
		//get age from date or birthdate
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
			? ((date("Y") - $birthDate[2]) - 1)
			: (date("Y") - $birthDate[2]));
		return $age;
	}

	function include_exists($fileName)
	{
		if (realpath($fileName) == $fileName) {
			return is_file($fileName);
		}
		if (is_file($fileName)) {
			return true;
		}

		$paths = explode("/", get_include_path());
		foreach ($paths as $path) {
			$rp = substr($path, -1) == "/" ? $path . $fileName : $path . "/" . $fileName;
			if (is_file($rp)) {
				return true;
			}
		}
		return false;
	}

	public function redirectWithMessage($type, $content)
	{
		$callBack_link = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : URL;
		$_SESSION['showMessage'] = true;
		$_SESSION['contentMessage'] = $this->getTemplateMessage($content, $type);
		echo "<script>window.location.href = '" . $callBack_link . "';</script>";
	}

	public function getTemplateMessage($message, $type)
	{
		$html = "";
		if ($type == "fail") {
			$html .= '
			<div class="toast fade show">
            	<div class="toast-header">
                	<strong class="me-auto"><i class="bi-globe"></i> Hello, world!</strong>
                	<small>just now</small>
                	<button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            	</div>
            	<div class="toast-body">
                '.$message.'
           	 	</div>
        	</div>';
		}
		if ($type == "success") {
			$html .= '
			<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
				<div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
			  		<div class="toast-header">
						<img src="..." class="rounded me-2" alt="...">
						<strong class="me-auto">Bootstrap</strong>
						<small>11 mins ago</small>
						<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
			  		</div>
			  		<div class="toast-body">
                		'.$message.'
            		</div>
				</div>
		  	</div>
		  ';
		}
		$html .= '
		<script>
			$(document).ready(function(){
				$(".toast").toast({
					autohide: false
				});
			});
		</script>';
		return $html;
	}

	public function validateEmail($email){
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	public function redirectTo($route)
	{
		echo "<script>window.location.href = '" . URL . "/" . $route . "';</script>";
		die();
	}
}
