# HighSchoolSitePhp : Le Site En Php  :earth_americas: :honeybee:



Il s'agit d'une amélioration d'un ancien projet des BTS SIO de 2018, on cherchait réellement à automatiser le site, par exemple par une Base De Donnée mais aussi par l'étape d'administration.Ce projet à été réaliser grâce à WampServer.

## 1. WampServer ? 


### 1.1 C'est quoi.

WampServer est une plate-forme de développement Web sous Windows pour des applications Web dynamiques à l’aide du serveur Apache2, du langage de scripts PHP et d’une base de données MySQL.



### 1.2 Accéder 

![8](https://user-images.githubusercontent.com/71081511/100545290-6b631380-325b-11eb-8a37-cbaeae30a616.png)

Il suffit de créer un nouvel Host (VirtualHost) puis de glisser dans le répertoire "www" votre "index.php"
Sur un navigateur Internet, taper 'LocalHost', de cette page, vous pourrez accéder à vos Virtual Host.





## 2. Présentation Du Menu : BootStrap :star:



### 2.1 Navigation Horizontale :
Pour utiliser la synthaxe BootStrap de manière simple, ajouter au source de 'index.php' : 
```html
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
```

![1](https://user-images.githubusercontent.com/71081511/100544281-deb55700-3254-11eb-8516-12cb3ba7e106.PNG)

>> On peut accéder aux items de la barre de navigation, accéder à des vues. 



### 2.2 Page D'Accueil : 
![4](https://user-images.githubusercontent.com/71081511/100544285-e117b100-3254-11eb-953a-758c66a0015b.PNG)
> On retrouve la localisation du lycée, et ses informations principales. 



## 3. Inscription Et Connexion !

Lors de la Connexion : l'utilisateur obtient les différents droits de son status : élève, professeur, visiteur et administrateur
Chaque rôle est gérer par le bied des ($SESSION) du php. 

```php
if(isset($_POST['Envoyez'])){
      $connexion = ConnectSql('%%%','%%%','3308','%%%');
      if(!empty($_POST['Pseudo'])){
         $pseudo=$_POST['Pseudo'];
         if(!empty($_POST['Mdp'])){
            $mdp=$_POST['Mdp'];
            $requeteVerif = "select u.pseudo, u.motDePasse, u.TypeUtil from utilisateur u where u.pseudo ='".$pseudo."' and u.motDePasse='".$mdp."';";
            $resultat = $connexion->query($requeteVerif) or die ("execution de la requete impossible");
            $ligne = $resultat->fetch(PDO::FETCH_OBJ); 
            if(isset($ligne->pseudo)){
               $uti=$ligne->TypeUtil;
               $utili=$ligne->pseudo;
               $_SESSION['id']=$uti;
               $_SESSION['pseudo']=$utili;
               echo "<script type='text/javascript'>document.location.replace('index.php?page=accueil');</script>";
               Exit();
```

![5](https://user-images.githubusercontent.com/71081511/100544287-e248de00-3254-11eb-9f6b-ac257cf00f8b.PNG)

>> en Fonction de votre compte vous possédez certains Droits 

![3](https://user-images.githubusercontent.com/71081511/100544284-e117b100-3254-11eb-940c-47f16bd437c0.PNG) -> ![6](https://user-images.githubusercontent.com/71081511/100544288-e2e17480-3254-11eb-8574-6da2d3a584ed.PNG)

## 4. Gestion des Utilisateurs. 
### 4.1 Gestion des membres : Prof et Eleves.

### 4.2 Gestion des Options en première année. 

### 4.3 Passage et Diplôme.


