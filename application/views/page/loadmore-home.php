<?php
$no = 0;
foreach ($data_post as $val) {
    $no++;
    ?>
    <?php if ($no >= 4) { ?>
        <div id="<?php echo $no; ?>" class="col s12 m4 l4">
            <div class="card-tm1 white">
                <div class="feat-bx-sm"> 				
                    <?php if (!empty($val['image']) && file_exists('assets/picture/thumb/' . $val['image'])) { ?>   
                        <img src="<?php echo base_url('assets/picture/thumb/' . $val['image'] . ''); ?>" data-src="<?php echo base_url('assets/picture/thumb/' . $val['image'] . ''); ?>" class="" alt="<?php echo $val['seotitle']; ?>"/>
                    <?php } elseif (!empty($val['video'])) { ?>                                
                        <img src="<?php echo ('http://img.youtube.com/vi/' . $val['video'] . '/0.jpg'); ?>" data-src="<?php echo ('http://img.youtube.com/vi/' . $val['video'] . '/0.jpg'); ?>" class="" alt="<?php echo $val['seotitle']; ?>">
                    <?php } else { ?>
                        <img src="<?php echo base_url('assets/images/no-image.jpg'); ?>" class=""/>
                    <?php } ?>				
                    <div class="info-cnt white-text">
                        <span><i class="material-icons">comment</i> 2K</span>
                        <span><i class="material-icons">share</i> 1K</span>
                        <span><i class="material-icons">visibility</i> <?php echo $val['hits']; ?></span>
                    </div>
                    <div class="bx-sdw">
                        <?php
                        $this->db->select('name');
                        $this->db->select('seotitle');
                        $this->db->from('post_category');
                        $this->db->where('id', $val['category']);
                        $query = $this->db->get();
                        {
                            ?>
                            <a href="<?php echo base_url('category/' . $query->row('seotitle') . ''); ?>">
                                <span class="cat-label red darken-4">  
            <?php echo $query->row('name'); ?>
                                </span>
                            </a>
        <?php } ?>
                        <div class="bx-text-feat">
                            <a href="<?php echo base_url('read/' . $val['id_post'] . '/' . $val['seotitle'] . ''); ?>">
                                <h1 class="stand-title white-text">
        <?php echo word_limiter($val['title'], 8); ?>
                                </h1>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bx-usr-info">
                    <a href="<?php echo base_url('profile/' . $val['id_reg'] . ''); ?>" class="teal-text">
                        <?php

                            if (file_exists('assets/member/' . $val['id_reg'] . '/thumb/' . $users[$val['id_reg']]['picture'])) {
                                echo '<a href="' . base_url('profile/' . $val['id_reg']) . '"><img class="circle usr-feat left" src="' . base_url('assets/member/' . $val['id_reg'] . '/thumb/' . $users[$val['id_reg']]['picture'] . '') . '" alt="' . $val['hits'] . '"></a>';
                            } else {
                                echo '<a href="' . base_url('profile/' . $val['id_reg']) . '"><img class="circle usr-feat left" src="' . base_url('assets/images/no-foto.jpg') . '"></a>';
                            }
                        ?>
                    </a>
                    <div class="auth-date grey-text lighten-5">
                        <span class="auth-feat">
                            <a href="<?php echo base_url('profile/' . $val['id_reg'] . ''); ?>" class="grey-text lighten-5">
                                <?php
                                echo $users[$val['id_reg']]['username'];
                                ?>
                            </a>
                        </span>
                        <div class="bx-date"><i class="material-icons">schedule</i><span class="feat-date"><?php echo hitung_mundur(strtotime($val['date'])); ?></span></div>
                    </div>
                    <div class="bx-sos right">
                        <a href="#" class="grey-text lighten-2"><i class="material-icons">share</i></a>
                        <a href="#" class="grey-text lighten-2"><i class="material-icons">bookmark</i></a>
                    </div>
                </div>
            </div> 
        </div> 
        <?php
    }
}
?>			