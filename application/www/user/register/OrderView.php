<h2>Passer une commande</h2>
<form method='POST' action="<?= $requestUrl ?>/Panier">
    <fieldset>
        <label for='meals'>Nom :</label>
        <select id='meals' name="mealId">
               
        <legend>Ajouter un article</legend>
        
                 <?php    foreach($meals as $key=>$value){
                        echo '<option value="'.$value['Id'].'">'.$value['Name'].'</option>';
                    }

                ?>
        </select><br>

        <section id="target">
            <h3 class="mealName"></h3>
            <p class="mealDesc"></p>
        </section>

        <label for='omount'>Quantité</label>
        <input type="text" name='amount' id='amount' value='1'><br>
        <input type='submit' value="Ajouter">

    </fieldset>

    <fieldset>
        <legend>Récapitulatif de la commande</legend>
            <table>
                <tbody>
                    <tr>
                        <th>Quanttié</th>
                        <th>Produit</th>
                        <th>Prix Unitaire</th>
                        <th>Prix Total</th>
                     </tr>
                     <?php  foreach($paniers as $mil) : ?>
                
                     <tr> 
                        <td> <?= $mil['amount']; ?></td>                           
                         <td><strong><?= $mil['name']; ?></strong></td>
                        <td><?= $mil['price']; ?> €</td>
                        <td><?= $mil['price']*$mil['amount']; ?> €</td>  
                        <td><a href="<?= $requestUrl ?>/Clear">supprimer</a></td>
                    </tr>          
                        
                    <?php endforeach; ?>
                </tbody>
            </table>
    </fieldset>

    <button>Valider la commande</button>
    <button>Annuler</button>
    
</form>