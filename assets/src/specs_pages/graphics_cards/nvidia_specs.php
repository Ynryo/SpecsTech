<div class="frame main-specs">
    <div class="spec">
        <img src="/assets/icons-assets/proccesor.png" alt="Architecture">
        <strong class="block-name">Architecture</strong>
        <span class="block-value"><?php echo $row['architecture'] ?></span>
    </div>
    <div class="spec">
        <img src="/assets/icons-assets/frequency.png" alt="Architecture">
        <strong class="block-name">Fréquence de base</strong>
        <span class="block-value"><?php echo $row['frequency'] ?> GHz</span>
    </div>
    <div class="spec">
        <img src="/assets/icons-assets/ram.png" alt="Architecture">
        <strong class="block-name">Mémoire vidéo</strong>
        <span class="block-value"><?php echo $row['vram'] ?> Go</span>
    </div>
    <div class="spec">
        <img src="/assets/icons-assets/ram.png" alt="Architecture">
        <strong class="block-name">Type de mémoire</strong>
        <span class="block-value"><?php echo $row['memory_type'] ?></span>
    </div>
</div>
<div class="product">
    <div class="specs">
        <br>
        <div class="table">
            <h3>Performances</h3>
            <div class="table-row">
                <span class="block-name">Fréquence de base</span>
                <span class="block-value"><?php echo $row['frequency'] ?> GHz</span>
            </div>
            <div class="table-row">
                <span class="block-name">Fréquence boost</span>
                <span class="block-value"><?php echo $row['boost_frequency'] ?> GHz</span>
            </div>
            <div class="table-row">
                <span class="block-name">Processeurs de flux</span>
                <span class="block-value"><?php echo $row['cores'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">Mémoire vidéo</span>
                <span class="block-value"><?php echo $row['vram'] ?> Go</span>
            </div>
            <div class="table-row">
                <span class="block-name">Type de mémoire</span>
                <span class="block-value"><?php echo $row['memory_type'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">Interface mémoire</span>
                <span class="block-value"><?php echo $row['bus_width'] ?> Bits</span>
            </div>
            <div class="table-row">
                <span class="block-name">Consommation</span>
                <span class="block-value"><?php echo $row['tpd'] ?> W</span>
            </div>
            <div class="table-row">
                <span class="block-name">Alimentation recommandée</span>
                <span class="block-value"><?php echo $row['suggested_psu'] ?> W</span>
            </div>
        </div>
        <div class="table">
            <h3>Affichage</h3>
            <div class="table-row">
                <span class="block-name">Définition d'affichage maximale</span>
                <span class="block-value"><?php echo $row['max_display_size'] ?> pixels</span>
            </div>
            <div class="table-row">
                <span class="block-name">Nombre d'écran(s)</span>
                <span class="block-value"><?php echo $row['max_screens'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">HDCP</span>
                <span class="block-value"><?php echo $row['hdcp'] ?></span>
            </div>
        </div>
        <div class="table">
            <h3>Connectique</h3>
            <div class="table-row">
                <span class="block-name">Sorties vidéos</span>
                <span class="block-value"><?php echo $row['video_output'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">Connecteur(s) d'alimentation</span>
                <span class="block-value"><?php echo $row['video_connectors'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">Bus</span>
                <span class="block-value"><?php echo $row['bus'] ?></span>
            </div>
        </div>
        <div class="table">
            <h3>Caractéristiques physiques</h3>
            <div class="table-row">
                <span class="block-name">Longueur</span>
                <span class="block-value"><?php echo $row['length'] ?> mm</span>
            </div>
            <div class="table-row">
                <span class="block-name">Largeur</span>
                <span class="block-value"><?php echo $row['width'] ?> mm</span>
            </div>
            <div class="table-row">
                <span class="block-name">Epaisseur</span>
                <span class="block-value"><?php echo $row['thickness'] ?> slots</span>
            </div>
            <div class="table-row">
                <span class="block-name">Type de refroidissement</span>
                <span class="block-value"><?php echo $row['cooling'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">Existe en Founders Edition</span>
                <span class="block-value"><?php echo $row['exist_in_fe'] ?></span>
            </div>
        </div>
        <div class="table">
            <h3>Technologies</h3>
            <div class="table-row">
                <span class="block-name">Cœur de ray tracing</span>
                <span class="block-value"><?php echo $row['rtx_cores'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">Cœur Tensor</span>
                <span class="block-value"><?php echo $row['tensor_cores'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">Architecture NVIDIA</span>
                <span class="block-value"><?php echo $row['architecture'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">NVIDIA DLSS</span>
                <span class="block-value"><?php echo $row['dlss'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">NVIDIA Reflex</span>
                <span class="block-value"><?php echo $row['reflex'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">NVIDIA Broadcast</span>
                <span class="block-value"><?php echo $row['broadcast'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">PCI Express</span>
                <span class="block-value"><?php echo $row['pcie'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">Resizable BAR</span>
                <span class="block-value"><?php echo $row['resize_bar'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">NVIDIA&copy; GeForce Experience&trade;</span>
                <span class="block-value"><?php echo $row['gf_exp'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">NVIDIA Ansel</span>
                <span class="block-value"><?php echo $row['ansel'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">NVIDIA Freestyle</span>
                <span class="block-value"><?php echo $row['freestyle'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">NVIDIA ShadowPlay</span>
                <span class="block-value"><?php echo $row['shadowplay'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">NVIDIA Highlights</span>
                <span class="block-value"><?php echo $row['highlight'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">NVIDIA G-Sync&copy;</span>
                <span class="block-value"><?php echo $row['gsync'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">Pilotes Game Ready</span>
                <span class="block-value"><?php echo $row['game_ready'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">Pilotes NVIDIA Studio</span>
                <span class="block-value"><?php echo $row['studio'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">NVIDIA Omniverse</span>
                <span class="block-value"><?php echo $row['omniverse'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">Microsoft DirectX&copy; 12 Ultimate</span>
                <span class="block-value"><?php echo $row['directx12_ulti'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">NVIDIA GPU Boost&trade;</span>
                <span class="block-value"><?php echo $row['gpu_boost'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">NVIDIA NVLink&trade; (SLI-Ready)</span>
                <span class="block-value"><?php echo $row['nvlink'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">API Vulkan RT, OpenGL 4.6</span>
                <span class="block-value"><?php echo $row['opengl_4'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">Encodeur NVIDIA (NVENC)</span>
                <span class="block-value"><?php echo $row['encode_nvidia'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">Décodeur NVIDIA (NVENC)</span>
                <span class="block-value"><?php echo $row['decode_nvidia'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">Capacité CUDA</span>
                <span class="block-value"><?php echo $row['cuda'] ?></span>
            </div>
            <div class="table-row">
                <span class="block-name">VR Ready</span>
                <span class="block-value"><?php echo $row['vr_ready'] ?></span>
            </div>
        </div>
    </div>
    <div class="product-img">
        <img srcset="/assets/images/3d/<?php echo $id ?>.png" src="/assets/images/3d/<?php echo $id ?>.png" alt="Image de la <?php echo $row['card_name'] ?>">
    </div>
</div>