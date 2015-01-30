
<?php include ('header.php');?>
<?php include_once ('caller.php');?>
<?php
    //we instantiate the caller class here    
    $call                   = new Caller();
    //we call the function the gets the jobs list only by url 
    $jobs                   = $call->getByUrl('http://localhost/RecruitmentApi/jobs/list');
    //we call the function the gets the jobs list with Curl 
    $jobs_response          = $call->getByCurl('http://localhost/RecruitmentApi/jobs/list');
    //we call the function the gets the candidates list only by url
    $candidates             = $call->getByUrl('http://localhost/RecruitmentApi/candidates/list');
    //we call the function the gets the candidates list with Curl
    $candidates_response    = $call->getByCurl('http://localhost/RecruitmentApi/candidates/list');

    if ($jobs_response) {
        //if we have a Curl result, we decode the json string from the response into an array
        $decoded_jobs = json_decode($jobs_response);
    }

    if ($candidates_response) {
        //if we have a Curl result, we decode the json string from the response into an array
        $decoded_candidates = json_decode($candidates_response);
    }
?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="mine">
                <!-- JOBS START  -->
                    <h2 style="color: red;">Address : http://localhost/RecruitmentApi/jobs/list</h2>
                    <fieldset>
                        <legend>Първи начин за достъп на API: чрез Url и PHP функция file_get_contents(); ,a получените данни - JSON :</legend>

                        <h5 style="margin-left: 1%;">file_get_contents('http://localhost/RecruitmentApi/jobs/list');</h5>
                        <?php echo '<pre>'; ?>
                        <?php print_r($jobs); ?>
                        <?php echo '</pre>'; ?>
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend>Втори начин за достъп на API: чрез Curl ,заявка ,a получените данни - JSON : </legend>
                        <h5 style="margin-left: 1%;">
                            $url = "http://localhost/RecruitmentApi/jobs/list";<br>
                            $ch  = curl_init();<br>
                            curl_setopt($ch, CURLOPT_URL, $url);<br>
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);<br>
                            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);<br>
                            $response = curl_exec($ch);<br>
                            curl_close($ch);
                        </h5>
                        <?php echo '<pre>'; ?>
                        <?php print_r($jobs_response); ?>
                        <?php echo '</pre>'; ?>
                    </fieldset>
                    </div>
                    <br>
                <!-- JOBS END  -->
                <hr>
                <!-- CANDIDATES START  -->
                <div class="mine">
                    <h2 style="color: red;">Address : http://localhost/RecruitmentApi/candidates/list</h2>
                    <fieldset>
                        <legend>Първи начин за достъп на API: чрез Url и PHP функция file_get_contents(); ,a получените данни - JSON :</legend>

                        <h5 style="margin-left: 1%;">file_get_contents('http://localhost/RecruitmentApi/candidates/list');</h5>
                        <?php echo '<pre>'; ?>
                        <?php print_r($candidates); ?>
                        <?php echo '</pre>'; ?>
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend>Втори начин за достъп на API: чрез Curl ,заявка ,a получените данни - JSON : </legend>
                        <h5 style="margin-left: 1%;">
                            $url = "http://localhost/RecruitmentApi/candidates/list";<br>
                            $ch  = curl_init();<br>
                            curl_setopt($ch, CURLOPT_URL, $url);<br>
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);<br>
                            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);<br>
                            $response = curl_exec($ch);<br>
                            curl_close($ch);
                        </h5>
                        <?php echo '<pre>'; ?>
                        <?php print_r($candidates_response); ?>
                        <?php echo '</pre>'; ?>
                    </fieldset>
                    </div>
                    <br>
                <!-- CANDIDATES END  -->
                
                <hr>
                
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 style="color: red;">http://localhost/RecruitmentApi/jobs/{id}</h4>
                            <h3 class="panel-title">All Jobs</h3>
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
                                        <?php foreach ($decoded_jobs as $job): ?>
                                            <tr>
                                                <td><a href="<?php echo 'jobs/'.$job->id; ?>"><?php echo $job->id; ?></a></td>
                                                <td><a href="<?php echo 'jobs/'.$job->id; ?>"><?php echo $job->position; ?></a></td>
                                                <td><a href="<?php echo 'jobs/'.$job->id; ?>"><?php echo $job->description; ?></a></td>
                                                <td><a href="<?php echo 'jobs/'.$job->id; ?>"><?php echo $job->craeted_on; ?></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 style="color: red;">http://localhost/RecruitmentApi/candidates/review/{id}</h4>
                            <h4 style="color: red;">http://localhost/RecruitmentApi/candidates/search/{id}</h4>
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
                                        <?php foreach ($decoded_candidates as $candidate): ?>
                                            <tr>
                                                <td><a href="<?php echo 'candidates/'.$candidate->id; ?>"><?php echo $candidate->id; ?></a></td>
                                                <td><a href="<?php echo 'candidates/'.$candidate->id; ?>"><?php echo $candidate->name; ?></a></td>
                                                <td><a href="<?php echo 'candidates/'.$candidate->id; ?>"><?php echo $candidate->position; ?></a></td>
                                                <td><a href="<?php echo 'candidates/'.$candidate->id; ?>"><?php echo $candidate->created_on; ?></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- /.row -->
                <div class="mine">
                    <fieldset>
                        <legend>Форма за търсене, използван метод $ _POST Curl,a получените данни - JSON :</legend>
                        <form class="navbar-form navbar-left" role="search" method="post" action="search.php">
                            <div class="form-group">
                              <input type="text" class="form-control" name="search" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>   
                        <?php //echo '<pre>'; ?>
                        <?php //print_r($candidates); ?>
                        <?php //echo '</pre>'; ?>
                    </fieldset>
                    <br>
                    </div>
            </div>
<br><br><br>
            <!-- /.container-fluid -->
<?php include ('footer.php');?>
