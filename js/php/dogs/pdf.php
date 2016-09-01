<?php
if(isset($_GET['id'])){
	echo($_GET['id']);
echo "string";
	include ('../connect.php');
	include('../../../class/dogs.class.php');

	 $art=new Dogs($pdo);
	//print_r($art->dogsProprio($_GET['id']));
	$list=$art->dogsProprio($_GET['id']);
	$listPro=$art->getListPro();
	//echo "<pre>";
	//print_r($list);
	//echo "</pre>";

	$html="";  
    $html.= "<page>
           
            <fieldset>
                <h1><img style=\"width: 20%;\"src=\"img/Police-logo.png\"><br>Immatriculation provisoire au registre des chiens dangereux</h1>
            </fieldset>";

           
           
            foreach ($listPro as $key => $value) {
              
            
            
                $html.="<h2>Maître</h2>

                <table>
                <tr>
                  <td ".$value['id_proprietaire'].">Nom : ".ucfirst($value['nom'])." ".ucfirst($value['prenom'])."</td> 
                </tr>
                <tr>
                  <td ".$value['id_proprietaire'].">Lieu et date de naissance : ".ucfirst($value['lieu_naissance'])." ,le ".$value['date_naissance']."</td>
                </tr> 
                <tr>
                  <td ".$value['id_proprietaire'].">Adresse : ".$value['rue']." ".$value['numero']." , ".$value['CP']." ".ucfirst($value['ville'])."</td>
                </tr>
                <tr>
                  <td ".$value['id_proprietaire'].">Téléphone : ".$value['telephone']."</td>
                </tr> 
                 <tr>
                  <td ".$value['id_proprietaire'].">Téléphone (GSM) : ".$value['gsm']."</td>
                </tr> 
                <tr>
                  <td ".$value['id_proprietaire'].">Période contactable : ".$value['periode_dispo']." ".$value['autre_dispo']."</td>
                </tr>
                </table>";
                }

                foreach ($list as $key => $val) {   
                  
                $html.="<h2>Chien</h2>

                <table>
                <tr>
                  <td ".$val['id_proprietaire'].">Nom : ".ucfirst($val['nom'])." </td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">Sexe : ".$val['sexe']." </td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">Date de naissance : ".$val['date_naissance']."</td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">N° d'identification Dog-id : ".$val['num_puce']." </td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">Puce : ".$val['puce_dogs']."</td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">Tatouage : ".$val['tatoo_dogs']."</td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">Race : ".$val['race']."</td>
                </tr>            
                </table>

                <h2>Divers</h2>

                <table>
                <tr>
                  <td ".$val['id_proprietaire'].">Lieu de détention du chien (si autre que celui de l'adresse du propriétaire) : ".ucfirst($val['detention'])."</td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">Nom et téléphone du vétérinaire traitant : ".ucfirst($val['veto'])." ".$val['vetotel']."</td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">Le chien est-il inscrit à un club de dressage? ".ucfirst($val['club'])."</td>
                </tr>
                <tr>
                  <td ".$val['id_proprietaire'].">Si oui,nom et adresse du club : ".$val['club_adresse']."</td>
                </tr>
                       
                </table>";
              }
            $html.="</page>";

            echo $html;
                  
    require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($html);
    $html2pdf->Output('exemple.pdf');
}

?>