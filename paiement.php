<?php
$catalogue = [
    'phone1' => ['nom' => 'OPPO Reno 8', 'prix' => 1230],
    'phone2' => ['nom' => 'Samsung A14 5G', 'prix' => 1400],
    'phone3' => ['nom' => 'OPPO A78', 'prix' => 3200],
    'phone4' => ['nom' => 'Samsung A15', 'prix' => 3000],
    'phone5' => ['nom' => 'Samsung Galaxy A25', 'prix' => 4100],
    'phone6' => ['nom' => 'Realme C55', 'prix' => 1300],
    'tablet1' => ['nom' => 'Tablette 10 pouces', 'prix' => 2230],
    'tablet2' => ['nom' => 'G-tab', 'prix' => 1200],
    'tablet3' => ['nom' => 'Oroco 4G', 'prix' => 3000],
    'tablet4' => ['nom' => 'Tablette écran large', 'prix' => 2000],
    'tablet5' => ['nom' => 'Tablette multi-caméras', 'prix' => 4100],
    'tablet6' => ['nom' => 'Tablette avec S Pen', 'prix' => 1300],
    'pc1' => ['nom' => 'HP Laptop Windows 10', 'prix' => 2230],
    'pc2' => ['nom' => 'Acer Laptop', 'prix' => 1200],
    'pc3' => ['nom' => 'Asus Chromebook', 'prix' => 3000],
    'pc4' => ['nom' => 'ASUS Laptop Blue Screen', 'prix' => 2000],
    'pc5' => ['nom' => 'Huawei MateBook', 'prix' => 4100],
    'pc6' => ['nom' => 'ASUS Vivobook', 'prix' => 1300],
];
function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
$id = $_GET['produit'] ?? '';
if (!isset($catalogue[$id])) {
    http_response_code(400);
    exit('Produit invalide. Retournez à la boutique.');
}
$p = $catalogue[$id];
?>
<!DOCTYPE html>
<html lang="fr"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Paiement - Aya Phones</title>
<style>
*{box-sizing:border-box}body{margin:0;padding:24px 14px;font-family:Arial,sans-serif;background:#f2f6f3;color:#222}
.box{max-width:520px;margin:25px auto;padding:28px;background:white;border-radius:16px;box-shadow:0 8px 28px #0001}
h1{text-align:center;color:#16834a;margin-top:0}.summary{background:#eaf7ef;padding:16px;border-radius:10px;margin:20px 0}
label{display:block;margin:15px 0 6px;font-weight:bold}input,textarea,select{width:100%;padding:12px;border:1px solid #ccc;border-radius:8px;font-size:15px}
button,.back{display:block;width:100%;text-align:center;margin-top:20px;padding:13px;border:0;border-radius:8px;background:#16834a;color:white;font-size:16px;text-decoration:none;cursor:pointer}
.back{background:#666}button:hover{background:#106638}
</style></head><body><main class="box">
<h1>💳 Paiement / Commande</h1>
<div class="summary"><p><strong>Produit :</strong> <?= e($p['nom']) ?></p>
<p><strong>Prix :</strong> <?= number_format($p['prix'], 2, ',', ' ') ?> DH</p></div>
<form action="confirmation.php" method="POST">
<input type="hidden" name="produit_id" value="<?= e($id) ?>">
<label for="nom">Nom complet :</label><input id="nom" name="nom" maxlength="100" required>
<label for="telephone">Téléphone :</label><input id="telephone" name="telephone" type="tel" pattern="[0-9 +()-]{8,20}" required>
<label for="adresse">Adresse de livraison :</label><textarea id="adresse" name="adresse" rows="3" maxlength="300" required></textarea>
<label for="mode">Mode de paiement :</label><select id="mode" name="mode" required><option value="">Choisir un mode</option><option value="livraison">Paiement à la livraison</option></select>
<button type="submit">Confirmer la commande</button></form>
<a class="back" href="index_aya_phones.html">Retour à la boutique</a>
<p style="font-size:13px;color:#666;margin-top:16px">Démo : cette page n'effectue pas de paiement bancaire et n'enregistre pas encore la commande dans une base de données.</p>
</main></body></html>
