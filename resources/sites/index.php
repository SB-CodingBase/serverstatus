<?php
$currPage = 'front_Serverstatus';
include BASE_PATH.'app/controller/PageController.php';
?>
    <section class="section" style="background-color: #2C2F33;">
        <div class="container">
            <div class="row">
                <div class="col"
                     style="background-color: #2C2F33;border: none;color: white;margin-top: -25px;margin-bottom: 35px"
                     role="alert">


                    <?php
                    $SQL = $db -> prepare("SELECT * FROM `mainsettings` WHERE `id` = '1'");
                    $SQL->execute(array(":user_id" => $userid));
                    if ($SQL->rowCount() != 0) {
                        while ($row = $SQL -> fetch(PDO::FETCH_ASSOC)){

                            if($row['mainstatus'] == 'online'){
                                $statusimg = 'https://cdn.discordapp.com/emojis/801013167035383808.gif?v=1';
                            } elseif($row['mainstatus'] == 'offline'){
                                $statusimg = 'https://cdn.discordapp.com/attachments/758684576993378334/853250583087808532/ezgif-6-ca91c3cedbbf.gif';
                            } elseif($row['mainstatus'] == 'teils'){
                                $statusimg = 'https://cdn.discordapp.com/attachments/758684576993378334/853250240575569940/ezgif-6-776e947170fb.gif';
                            } elseif($row['mainstatus'] == 'wartung'){
                                $statusimg = 'https://cdn.discordapp.com/attachments/758684576993378334/853250796812500992/ezgif-6-8b7dc34421dd.gif';
                            }

                            ?>


					<!--<center><img width="4%" src="<?= $statusimg; ?>"></center>-->
            <div class="row justify-content-center">
                <div class="col-8 text-center">
                    <div class="section-title mb-4 pb-2">

                        <table class="table table-padded" style="min-height: 150px;">
                                <tbody>


						<tr class="tr-hover text-no-select" style="display: block!important;width: 100%;">
							
				<?php if($row['mainstatus'] == 'online'){ echo '
						<td style="text-align: left;width: 100%" id="title-1" class="">
						<center>	
						<div class="alert text-white" style="background-color: #33FF77 !important;color: #23272A;font-size: 20px" role="alert">                         Zurzeit sind alle Server uneingeschränkt erreichbar 🙂
                        </div>
						</center>
						</td>
						                                      
						<td class="text-center">
                        </td>
				
				'; } ?>

				<?php if($row['mainstatus'] == 'offline'){ echo '

						<td style="text-align: left;width: 100%" id="title-1" class="">
						<center>	
						<div class="alert text-white" style="background-color: #FF3333 !important;color: #23272A;font-size: 20px" role="alert">                         Zurzeit sind wir nicht erreichbar 😵
                        </div>
						</center>
						</td>
						                                      
						<td class="text-center">
                        </td>
				
				'; } ?>

				<?php if($row['mainstatus'] == 'teils'){ echo '

						<td style="text-align: left;width: 100%" id="title-1" class="">
						<center>
						<div class="alert text-white" style="background-color: #FFAC33 !important;color: #23272A;font-size: 20px" role="alert">                         Einige Dienste sind zurzeit nur beschränkt erreichbar 😳
                        </div>
						</center>
						</td>
						                                      
						<td class="text-center">
                        </td>
				
				'; } ?>

				<?php if($row['mainstatus'] == 'wartung'){ echo '
						

						<td style="text-align: left;width: 100%" id="title-1" class="">
						<center>
						<div class="alert text-white" style="background-color: #33F0FF !important;color: #23272A;font-size: 20px" role="alert">                         Zurzeit führen wir eine Wartung durch 👷‍♂️
                        </div>
						</center>
						</td>
						                                      
						<td class="text-center">
                        </td>
				
				'; } ?>
										
						</tr>
                                    </tbody>
                                </table>
					</div>
				</div>
					</div>

                        <?php } } ?>
                   <!-- <div class="box box-online" id="class-state">
                        <div class="pulsator pulsator-online"></div>
                    </div>-->
                        <!--<p class="text-muted para-desc mx-auto mt-4 mt-2 text-center" id="aok" style="">
                            Zurzeit sind alle Server uneingeschränkt erreichbar 🙂
                        </p>-->

                        <!--<p class="text-muted para-desc mx-auto mt-4 mt-2 text-center" id="hok" style="">
                            Einige Dienste sind zurzeit nur beschränkt erreichbar 😳
                        </p>-->

                        <!--<p class="text-muted para-desc mx-auto mt-4 mt-2 text-center" id="nok" style="display:none">
                            Zurzeit sind wir nicht erreichbar 😵</p>-->
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-8 text-center">
                    <div class="section-title mb-4 pb-2">



                        <h4 class="title mb-1 text-left text-white" style="font-size: 18px;float: left">
                            Ausfälle/Wartungen
                        </h4>
                                                        
                        <table class="table table-padded" style="min-height: 150px;">
                                <tbody>


                    <?php
                    $SQL = $db -> prepare("SELECT * FROM `issues` WHERE `status` = 'Offen'");
                    $SQL->execute(array(":user_id" => $userid));
                    if ($SQL->rowCount() != 0) {
                        while ($row = $SQL -> fetch(PDO::FETCH_ASSOC)){

                            ?>

			
									<tr class="tr-hover text-no-select" style="display: block!important;width: 100%;" onclick="toggleCollapse('#bar-1')"
                                        id="monitor-1" 
                                        data-title="Ausfall 
                                        <br>Status:													
													<?php if($row['Status'] == 'Closed'){ echo '
														Behoben
														'; } ?>
														<?php if($row['Status'] == 'Offen'){ echo '
														Nicht behoben
														'; } ?>
													" 
                                        data-html="true" data-toggle="tooltip">


											<td style="text-align: left;width: 100%" id="title-1" class="">
												<i class="fa fa-exclamation-triangle text-warning"></i>
												<b>AUSFALL</b> <a href="issue/<?= $row['id']; ?>" class="text-white"><?= $row['title']; ?></a>
											</td>
                                        <td class="text-center">


                                        </td>
                                    </tr>

                        <?php } } ?>

                    <?php
                    $SQL = $db -> prepare("SELECT * FROM `wartungen` WHERE `status` = 'Running' or `status` = 'planed'");
                    $SQL->execute(array(":user_id" => $userid));
                    if ($SQL->rowCount() != 0) {
                        while ($row = $SQL -> fetch(PDO::FETCH_ASSOC)){

                            if($row['Status'] == 'Closed'){
                                $statuss = 'Beendet';
                            } elseif($row['Status'] == 'planed'){
                                $statuss = 'Geplant';
                            } elseif($row['Status'] == 'Running'){
                                $statuss = 'Im Gange';
                            } 

                            ?>

                                                                            
									<tr class="tr-hover text-no-select" style="display: block!important;width: 100%;" onclick="toggleCollapse('#bar-1')"
                                        id="monitor-1" 
                                        data-title="WARTUNG 
                                        <br>Status: <?= $statuss; ?>" 
                                        data-html="true" data-toggle="tooltip">


											<td style="text-align: left;width: 100%" id="title-1" class="">
												<i class="fa fa-tools text-info"></i>
												<b>WARTUNG</b> <a href="wartung/<?= $row['id']; ?>" class="text-white"><?= $row['title']; ?></a>
											</td>
                                        <td class="text-center">


                                        </td>
                                    </tr>

                        <?php } } ?>

                                </tbody>
                            </table>
     

                            <h4 class="title mb-1 text-left text-white" style="font-size: 18px;float: left">
                                ALLE SERVER
                            </h4>
                                                            
                            <table class="table table-padded" style="min-height: 50px;">
                                    <tbody>


                    <?php
                    $SQL = $db -> prepare("SELECT * FROM `services` WHERE `anzeigen` = 'Ja' ORDER BY `sort_id`");
                    $SQL->execute(array(":user_id" => $userid));
                    if ($SQL->rowCount() != 0) {
                        while ($row = $SQL -> fetch(PDO::FETCH_ASSOC)){

                            if($row['status'] == 'Online'){
                                $status = 'Funktionsfähig';
                            } elseif($row['status'] == 'Offline'){
                                $status = 'Nicht erreichbar';
                            } elseif($row['status'] == 'Leistung'){
                                $status = 'Leistungsabfall';
                            } elseif($row['status'] == 'Wartung'){
                                $status = 'Wartungsarbeiten';
                            }

                            if($row['status'] == 'Online'){
                                $statusimg = 'https://cdn.discordapp.com/emojis/801013167035383808.gif?v=1';
                            } elseif($row['status'] == 'Offline'){
                                $statusimg = 'https://cdn.discordapp.com/attachments/758684576993378334/853250583087808532/ezgif-6-ca91c3cedbbf.gif';
                            } elseif($row['status'] == 'Leistung'){
                                $statusimg = 'https://cdn.discordapp.com/attachments/758684576993378334/853250240575569940/ezgif-6-776e947170fb.gif';
                            } elseif($row['status'] == 'Wartung'){
                                $statusimg = 'https://cdn.discordapp.com/attachments/758684576993378334/853250796812500992/ezgif-6-8b7dc34421dd.gif';
                            }

                            if($row['status'] == 'Online'){
                                $statuscol = 'success';
                            } elseif($row['status'] == 'Offline'){
                                $statuscol = 'danger';
                            } elseif($row['status'] == 'Leistung'){
                                $statuscol = 'warning';
                            } elseif($row['status'] == 'Wartung'){
                                $statuscol = 'info';
                            }

                            ?>


                                        <tr class="tr-hover text-no-select" style="display: block!important;width: 100%;" onclick="toggleCollapse('#bar-1')"
                                            id="monitor-1"                              
											data-title="<?= $row['name']; ?> 
														<br>Status: <?= $status; ?>
														<br>Standort: <?= $row['standort']; ?>
														<br>Uptime: <?= $row['uptime']; ?>%" 
                                        data-html="true" data-toggle="tooltip">
    
    
                                            <td style="text-align: left;width: 100%" id="title-1"
                                                class="">												
												<img width="4%" src="<?= $statusimg; ?>">&nbsp;|&nbsp;
												<i class="<?= $row['icon']; ?> text-<?= $statuscol; ?>"></i> 
												<a href="service/<?= $row['id']; ?>" class="text-white"><?= $row['name']; ?></a>
											</td>
											
											
																							
                                            <td style="text-align: left;width: 10000%">                                       
                                            </td>
                                        </tr>
                        <?php } } ?>
                                                                                                            

    
                                    </tbody>
                                </table>




                        </div>
                        </div>




                        


                </div>


                
            </div>