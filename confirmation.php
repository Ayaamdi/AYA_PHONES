<?php
$catalogue = [
    'phone1'=>['nom'=>'OPPO Reno 8','prix'=>1230], 'phone2'=>['nom'=>'Samsung A14 5G','prix'=>1400],
    'phone3'=>['nom'=>'OPPO A78','prix'=>3200], 'phone4'=>['nom'=>'Samsung A15','prix'=>3000],
    'phone5'=>['nom'=>'Samsung Galaxy A25','prix'=>4100], 'phone6'=>['nom'=>'Realme C55','prix'=>1300],
    'tablet1'=>['nom'=>'Tablette 10 pouces','prix'=>2230], 'tablet2'=>['nom'=>'G-tab','prix'=>1200],
    'tablet3'=>['nom'=>'Oroco 4G','prix'=>3000], 'tablet4'=>['nom'=>'Tablette écran large','prix'=>2000],
    'tablet5'=>['nom'=>'Tablette multi-caméras','prix'=>4100], 'tablet6'=>['nom'=>'Tablette avec S Pen','prix'=>1300],
    'pc1'=>['nom'=>'HP Laptop Windows 10','prix'=>2230], 'pc2'=>['nom'=>'Acer Laptop','prix'=>1200],
    'pc3'=>['nom'=>'Asus Chromebook','prix'=>3000], 'pc4'=>['nom'=>'ASUS Laptop Blue Screen','prix'=>2000],
    'pc5'=>['nom'=>'Huawei MateBook','prix'=>4100], 'pc6'=>['nom'=>'ASUS Vivobook','prix'=>1300]
];
function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
$id = $_POST['produit_id'] ?? '';
$nom = trim($_POST['nom'] ?? '');
$tel = trim($_POST['telephone'] ?? '');
$adresse = trim($_POST['adresse'] ?? '');
$mode = $_POST['mode'] ?? '';
if (!isset($catalogue[$id]) || $nom === '' || $tel === '' || $adresse === '' || $mode !== 'livraison') {
    http_response_code(400);
    exit('Informations invalides. Retournez à la boutique et réessayez.');
}
$p = $catalogue[$id];
?>
<!DOCTYPE html><html lang="fr"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Confirmation - Aya Phones</title><style>
body{font-family:Arial,sans-serif;background:#f2f6f3;margin:0;padding:24px 14px;color:#222}
.box{max-width:520px;margin:30px auto;background:white;padding:28px;border-radius:16px;box-shadow:0 8px 28px #0001}
h1{color:#16834a;text-align:center}.summary{background:#eaf7ef;padding:16px;border-radius:10px}
a{display:block;text-align:center;background:#16834a;color:white;padding:13px;border-radius:8px;text-decoration:none;margin-top:20px}
</style></head><body><main class="box"><h1>✅ Récapitulatif de commande</h1>
<p>Merci <?= e($nom) ?>. Voici votre récapitulatif :</p><div class="summary">
<p><strong>Produit :</strong> <?= e($p['nom']) ?></p><p><strong>Prix :</strong> <?= number_format($p['prix'],2,',',' ') ?> DH</p>
<p><strong>Téléphone :</strong> <?= e($tel) ?></p><p><strong>Adresse :</strong> <?= e($adresse) ?></p>
<p><strong>Paiement :</strong> À la livraison</p></div>
<p>Cette démo n'enregistre pas encore la commande dans une base de données et ne l'envoie pas au vendeur.</p>
<a href="index_aya_phones.html">Retour à Aya Phones</a></main></body></html>
