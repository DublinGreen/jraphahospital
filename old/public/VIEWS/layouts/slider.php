        <!-- Nivo Slider starts
        ================================================== -->
        <div id="myCarousel" class="container visible-lg">
            <div class="slider-wrapper theme-default" style="margin : -2% 0% 0% -9%; width: 100%;">
                <div class="ribbon"></div>
                <div id="slider" class="nivoSlider" style="left: 0px; top: 1px">
                    <?php
                        $displaySlider = new MySql();
                        if($query = $displaySlider->query("SELECT * FROM slider ORDER BY time_created DESC")){
                            $resultSet = $displaySlider->fetch($query);
                            
                            while($resultSet = $displaySlider->fetch($query)){
                                echo("<img src='CONTROLLERS/savedPackageImages/_sml{$resultSet['image']}' alt='Slider Image' title='{$resultSet['title']}' />");
                            }
                        }
                    ?>
                </div>
                <div id="htmlcaption" class="nivo-html-caption">
                    <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
                </div>
            </div>
        </div><!-- /Nivo Slider ends -->