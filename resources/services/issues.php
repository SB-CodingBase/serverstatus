<?php
$currPage = 'front_Issues';
include BASE_PATH.'app/controller/PageController.php';


?>

    <section class="section" style="background-color: #2C2F33;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8 text-center">
                    <div class="section-title mb-4 pb-2">



                        <h4 class="title mb-1 text-left text-white style="font-size: 18px;float: left>
							Fehler
                        </h4>


                                                        
                        <table class="table table-padded" style="min-height: 100px;">
                                <tbody>
												

                    <?php
                    $SQL = $db -> prepare("SELECT * FROM `issues`");
                    $SQL->execute(array(":nothing" => $nothing));
                    if ($SQL->rowCount() != 0) {
                        while ($row = $SQL -> fetch(PDO::FETCH_ASSOC)){

                            ?>

			
									<tr class="tr-hover text-no-select" style="display: block!important;width: 100%;" onclick="toggleCollapse('#bar-1')"
                                        id="monitor-1" 
                                        data-title="AUSFALL 
                                        <br>Status:
																								
													<?php if($row['Status'] == 'Closed'){ echo '
														Behoben
														'; } ?>
														<?php if($row['Status'] == 'Running'){ echo '
														Nicht behoben
														'; } ?>
													" 
                                        data-html="true" data-toggle="tooltip">


											<td style="text-align: left;width: 100%" id="title-1" class="">
												<b>AUSFALL</b> <a href="issue/<?= $row['id']; ?>" class="text-white"><?= $row['title']; ?></a>
											</td>
                                        <td class="text-center">


                                        </td>
                                    </tr>

                        <?php } } ?>

							</tbody>
						</table>


