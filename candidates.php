<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/sb-admin.css" rel="stylesheet">
<link href="../css/plugins/morris.css" rel="stylesheet">
<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<?php 
/*
 * this is a test Api App
 * made by Viktor Panayotov for Cayetanogaming
 * on 09.01.2015,Varna,Bulgaria
 */
?>
<?php include ('header.php'); ?>
<?php include_once ('caller.php'); ?>

<?php 
    //we instantiate the caller class here
    $call               = new Caller();
    //we call the function the gets one candidate only by url 
    $candidate_json     = $call->getByUrl('http://localhost/RecruitmentApi/candidates/review/'.$_GET['candidates']);
    //we call the function the gets one candidate decoded from json string into an array
    $candidate          = $call->getByUrlDecoded('http://localhost/RecruitmentApi/candidates/review/'.$_GET['candidates']);
    //we call the function the gets one candidate with Curl
    $candidate_json_1   = $call->getByCurl('http://localhost/RecruitmentApi/candidates/review/'.$_GET['candidates']) ;
    //we decode the recieved json string into an array
    $curl_candidate     = json_decode($candidate_json_1);
?>
        
        
        
        <div id="page-wrapper">
            <div class="container-fluid">
                <h4 style="color: red;">Address : http://localhost/RecruitmentApi/candidates/review/<?php echo $_GET['candidates']; ?></h4>
                <fieldset>
                    <legend>Първи начин за достъп на API: чрез Url и PHP функция file_get_contents(); ,a получените данни - JSON :</legend>
                    
                    <h5 style="margin-left: 1%;">file_get_contents('http://localhost/RecruitmentApi/candidates/review/<?php echo $_GET['candidates']; ?>');</h5>
                    <?php echo '<pre>'; ?>
                    <?php print_r($candidate_json); ?>
                    <?php echo '</pre>'; ?>
                </fieldset>
                <br>
                <fieldset>
                    <legend>Втори начин за достъп на API: чрез Curl ,заявка ,a получените данни - JSON : </legend>
                    <h5 style="margin-left: 1%;">
                        $url = "http://localhost/RecruitmentApi/candidates/review/<?php echo $_GET['candidates']; ?>";<br>
                        $ch  = curl_init();<br>
                        curl_setopt($ch, CURLOPT_URL, $url);<br>
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);<br>
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);<br>
                        $response = curl_exec($ch);<br>
                        curl_close($ch);
                    </h5>
                    <?php echo '<pre>'; ?>
                    <?php print_r($candidate_json_1); ?>
                    <?php echo '</pre>'; ?>
                </fieldset>
                <br>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Candidates</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Position</th>
                                            <th>Description</th>
                                            <th>Created on</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($curl_candidate as $val): ?>
                                            <tr>
                                                <td><?php echo $val->id; ?></td>
                                                <td><?php echo $val->name; ?></td>
                                                <td><?php echo $val->position; ?></td>
                                                <td><?php echo $val->created_on; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   

<?php include ('footer.php');?>