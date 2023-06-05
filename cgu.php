<?php
include('server.php');

if (isset($_GET['accept'])) {
    $username = $_SESSION['username'];
    $query = "UPDATE users
  SET  cond_accepte = 1


  WHERE username = '$username'";
  mysqli_query($db, $query);
    header("location: capteur");
}


if (isset($_GET['refuse'])) {
  $username = $_SESSION['username'];
  $query = "DELETE FROM users where username='$username'";



mysqli_query($db, $query);
  header("location: site.html");
}


?>


<!DOCTYPE html>
<html>
<head>
  <title text_fr="Conditions d'utilisation" text_esp="Términos y condiciones">Conditions d'utilisation</title>
  <script src="traduction.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    
    .content {
      max-width: 600px;
      
      padding: 20px;
      background-color: #f1f1f1;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      overflow: auto;
    }
    
    h1 {
      text-align: center;
    }
    
    p {
      line-height: 1.5;
    }


    .cgu_text{
      max-height:300px;
      overflow: auto;
    }

    .cgu_text p{
      font-style: italic;
  font-size: small;
  color: #333333; /* Gris foncé */
    }

    
    .accept-button {
      display: block;
      width: 200px;
      margin: 20px auto;
      padding: 10px;
      text-align: center;
      background-color: #4caf50;
      color: white;
      font-size: 16px;
      text-decoration: none;
      border-radius: 5px;
    }
    
    .accept-button:hover {
      background-color: #45a049;
    }



    .refuse-button {
      display: block;
      width: 200px;
      margin: 20px auto;
      padding: 10px;
      text-align: center;
      background-color: #db0f27;
      color: white;
      font-size: 16px;
      text-decoration: none;
      border-radius: 5px;
    }
    
    .refuse-button:hover {
      background-color: #b22222;
    }
  </style>
</head>
<body>
  
  <div class="container">
    
    <div class="content" style="overflow: auto;">
    <button onclick="traduire('français')"  text_fr="Français" text_esp="Français">Français</button>
    <button onclick="traduire('espagnol')" text_fr="Español" text_esp="Español">Español</button>
      <h1 text_fr="Conditions d'utilisation" text_esp="Términos y condiciones">Conditions d'utilisation</h1>
      <strong> <?php echo $_SESSION["username"]?> </strong> <p 
      text_fr="veuillez lire attentivement les conditions d'utilisation suivantes :"
       text_esp=" Lea atentamente los términos y condiciones siguientes: ">
       veuillez lire attentivement les conditions d'utilisation suivantes :</p>
       <div class="cgu_text">
      <p   
        text_fr="Ce site Web est détenu et exploité par Vitashield. Les présentes conditions définissent les conditions dans lesquelles vous pouvez utiliser notre site Web et les services que nous proposons. Cette page Web offre aux visiteurs la possibilité d'accéder aux enregistrements obtenus grâce au boîtier de leur téléphone portable Vitashield sur les capteurs en temps réel. En accédant ou en utilisant le site Web de notre service, vous reconnaissez avoir lu, compris et accepté d'être lié par ces conditions : Pour utiliser notre site Web et/ou recevoir nos services, vous devez avoir au moins 18 ans, ou le majorité de l'âge légal dans votre juridiction, et possédez l'autorité légale, le droit et la liberté de conclure ces Conditions en tant qu'accord contraignant. Vous n'êtes pas autorisé à utiliser ce site Web et/ou à recevoir des services si cela est interdit dans votre pays ou en vertu de toute loi ou réglementation qui vous est applicable. En achetant un étui Vitashield, vous acceptez que : (i) vous êtes responsable de la lecture de la liste complète des articles avant de vous engager à acheter ; (ii) vous concluez un contrat juridiquement contraignant pour acheter un article lorsque vous vous engagez à acheter un article et à terminer le processus de vérification. Les prix que nous facturons pour l'utilisation de nos services et pour nos produits sont indiqués sur le site Web. Nous nous réservons le droit de modifier nos prix pour les produits affichés à tout moment et de corriger les erreurs de prix qui pourraient survenir par inadvertance. Les frais pour les services et tous les autres frais pouvant être encourus dans le cadre de votre utilisation du service, tels que les taxes et les éventuels frais de transaction, seront facturés sur votre mode de paiement sur une base mensuelle. Pour tout produit non endommagé, renvoyez-le simplement avec l'emballage inclus ainsi que le reçu d'origine (ou le reçu cadeau) dans les 14 jours à compter de la date à laquelle vous avez reçu le produit, et nous l'échangerons ou vous offrirons un remboursement selon le mode de paiement d'origine. . De plus, veuillez noter ce qui suit : (i) Les produits ne peuvent être retournés que dans le pays dans lequel ils ont été initialement achetés. Nous pouvons, sans préavis, modifier les services ; cesser de fournir les services ou toute fonctionnalité des services que nous proposons ; ou créer des limites pour les services. Nous pouvons suspendre de manière permanente ou temporaire l'accès aux Services sans préavis ni responsabilité pour quelque raison que ce soit. Lorsque nous recevons une demande de garantie valide pour un produit que nous vendons, nous réparerons le défaut concerné ou remplacerons le produit. Si nous ne sommes pas en mesure de réparer ou de remplacer le produit dans un délai raisonnable, le client aura droit à un remboursement complet lorsque le produit nous sera retourné. Nous paierons l'expédition des produits réparés ou remplacés au client et le client sera responsable de nous retourner le produit. Le Service et tous les éléments inclus ou transférés, y compris, sans s'y limiter, les logiciels, les images, le texte, les graphiques, les logos, les brevets, les marques de commerce, les marques de service, les droits d'auteur, les photographies, l'audio, la vidéo, la musique et tous les droits de propriété intellectuelle liés à eux, sont la propriété exclusive de Vitashield. Sauf indication contraire explicite dans les présentes, rien dans les présentes conditions ne sera réputé créer une licence dans ou sous ces droits de propriété intellectuelle, et vous acceptez de ne pas vendre, concéder sous licence, louer, modifier, distribuer, copier, reproduire, transmettre, afficher publiquement, exécuter publiquement, publier, adapter, éditer ou créer des œuvres dérivées de ceux-ci. Nous pouvons résilier ou suspendre de manière permanente ou temporaire votre accès au Service sans préavis ni responsabilité pour quelque raison que ce soit, y compris si, à notre seule discrétion, vous enfreignez une disposition des présentes Conditions ou toute loi ou réglementation applicable. Vous pouvez interrompre l'utilisation et demander l'annulation de votre compte et/ou de tout service à tout moment. Nonobstant toute disposition contraire dans ce qui précède, en ce qui concerne les abonnements automatiquement renouvelés aux services payants, ces abonnements ne seront suspendus qu'à l'expiration de la période applicable pour laquelle vous avez déjà effectué le paiement. Vous acceptez d'indemniser et de dégager Vitashield de toute réclamation, perte, responsabilité, réclamation ou dépense (y compris les honoraires d'avocat) faite contre vous par un tiers à la suite de, découlant de ou en relation avec votre utilisation. du site Web ou de l'un des services proposés sur le site Web.Dans toute la mesure permise par la loi applicable, Vitashield ne sera en aucun cas responsable des dommages indirects, punitifs, accessoires, spéciaux, consécutifs ou exemplaires, y compris, sans s'y limiter, les dommages pour perte de profits, de clientèle, d'utilisation, de données. ou d'autres pertes intangibles, résultant de ou liées à l'utilisation ou à l'impossibilité d'utiliser le Service.

Dans toute la mesure permise par la loi applicable, [Propriétaire du site Web] n'assume aucune responsabilité pour (i) les erreurs, erreurs ou inexactitudes dans le contenu ; (ii) des blessures corporelles ou des dommages matériels, de quelque nature que ce soit, résultant de votre accès ou de votre utilisation de notre service ; et (iii) tout accès non autorisé ou utilisation de nos serveurs sécurisés et/ou de toute information personnelle qui y est stockée.
Nous nous réservons le droit de modifier ces conditions de temps à autre à notre seule discrétion. Par conséquent, vous devriez consulter ces pages périodiquement. Lorsque nous modifions les Conditions de manière substantielle, nous vous informerons que des modifications substantielles ont été apportées aux Conditions. Votre utilisation continue du site Web ou de notre service après un tel changement constitue votre acceptation des nouvelles conditions. Si vous n'acceptez pas l'une de ces conditions ou toute version future des conditions, n'utilisez pas ou n'accédez pas (ou ne continuez pas à accéder) au site Web ou au service.
Vous acceptez de recevoir nos messages et matériels promotionnels de temps à autre, par courrier, e-mail ou tout autre formulaire de contact que vous nous fournissez (y compris votre numéro de téléphone pour les appels ou les SMS). Si vous ne souhaitez pas recevoir de tels documents promotionnels ou avis, il vous suffit de nous le faire savoir à tout moment.
Les présentes Conditions, les droits et recours prévus aux présentes, ainsi que toutes les réclamations et tous les litiges liés à ceux-ci et/ou aux Services, seront régis, interprétés et appliqués à tous égards uniquement et exclusivement conformément au droit substantiel interne de la France sans respect de ses principes de conflit de lois. Toutes les réclamations et contestations seront soumises, et vous acceptez de les faire trancher exclusivement par, un tribunal compétent situé à Paris. L'application de la Convention des Nations Unies sur les contrats de vente internationale de marchandises est expressément exclue.




"

        text_esp="Esta página web es propiedad y está operado por Vitashield. Estos Términos establecen los términos y condiciones bajo los cuales usted puede usar nuestra página web y servicios ofrecidos por nosotros. Esta página web ofrece a los visitantes la posibilidad de acceder a los registros obtenidos por medio de la funda de su celular Vitashield sobre los sensores en tiempo real. Al acceder o usar la página web de nuestro servicio, usted aprueba que haya leído, entendido y aceptado estar sujeto a estos Términos:
Para usar nuestro página web y / o recibir nuestros servicios, debes tener al menos 18 años de edad, o la mayoría de edad legal en tu jurisdicción, y poseer la autoridad legal, el derecho y la libertad para participar en estos Términos como un acuerdo vinculante. No tienes permitido utilizar esta página web y / o recibir servicios si hacerlo está prohibido en tu país o en virtud de cualquier ley o regulación aplicable a tu caso.
Al comprar una funda Vitashield, aceptas que: (i) eres responsable de leer el listado completo del artículo antes de comprometerte a comprarlo: (ii) celebras un contrato legalmente vinculante para comprar un artículo cuando te comprometes a comprar un artículo y completar el proceso de check-out.

 Los precios que cobramos por usar nuestros servicios y para nuestros productos se enumeran en  la página web. Nos reservamos el derecho de cambiar nuestros precios para los productos que se muestran en cualquier momento y de corregir los errores de precios que pueden ocurrir inadvertidamente. 
La tarifa por los servicios y cualquier otro cargo que pueda incurrir en relación con tu uso del servicio, como los impuestos y las posibles tarifas de transacción, se cobrarán mensualmente a tu método de pago.
Para cualquier producto no dañado, simplemente devuélvelo  con el paquete incluidos junto con el recibo original (o recibo de regalo) dentro de los 14 días posteriores a la fecha que recibiste el producto, y lo cambiaremos o te ofreceremos un reembolso basado en el método de pago original . Además, ten en cuenta lo siguiente: (i) Los productos solo se pueden devolver en el país en el que se compraron originalmente.
Podemos, sin aviso previo, cambiar los servicios; dejar de proporcionar los servicios o cualquier característica de los servicios que ofrecemos; o crear límites para los servicios. Podemos  suspender de manera permanente o temporal el acceso a los servicios sin previo aviso ni responsabilidad por cualquier motivo, o sin ningún motivo.
Cuando recibimos un reclamo de garantía válido de un producto que vendemos, repararemos el defecto relevante o reemplazaremos el producto. Si no podemos reparar o reemplazar el producto dentro de un tiempo razonable, el cliente tendrá derecho a un reembolso total cuando nos devuelva el producto. Pagaremos el envío de los productos reparados o reemplazados al cliente y el cliente será responsable de devolvernos el producto.
El Servicio y todos los materiales incluidos o transferidos, incluyendo, sin limitación, software, imágenes, texto, gráficos, logotipos, patentes, marcas registradas, marcas de servicio, derechos de autor, fotografías, audio, videos, música y todos los Derechos de Propiedad Intelectual relacionados con ellos, son la propiedad exclusiva de Vitashield. Salvo que se indique explícitamente en este documento, no se considerará que nada en estos Términos crea una licencia en o bajo ninguno de dichos Derechos de Propiedad Intelectual, y tu aceptas no vender, licenciar, alquilar, modificar, distribuir, copiar, reproducir, transmitir, exhibir públicamente, realizar públicamente, publicar, adaptar, editar o crear trabajos derivados de los mismos.
Podemos terminar o suspender de manera permanente o temporal tu acceso al servicio sin previo aviso y responsabilidad por cualquier razón, incluso si a nuestra sola determinación tu violas alguna disposición de estos Términos o cualquier ley o regulación aplicable. Puedes descontinuar el uso y solicitar cancelar tu cuenta y / o cualquier servicio en cualquier momento. Sin perjuicio de lo contrario en lo que antecede, con respecto a las suscripciones renovadas automáticamente a los servicios pagados, dichas suscripciones se suspenderán solo al vencimiento del período correspondiente por el que ya has realizado el pago.
Usted acuerda indemnizar y eximir de responsabilidad a Vitashield de cualquier demanda, pérdida, responsabilidad, reclamación o gasto (incluidos los honorarios de abogados) que terceros realicen en tu contra como consecuencia de, o derivado de, o en relación con tu uso de la página web o cualquiera de los servicios ofrecidos en la página web.
En la máxima medida permitida por la ley aplicable, en ningún caso el Vitashield será responsable por daños indirectos, punitivos, incidentales, especiales, consecuentes o ejemplares, incluidos, entre otros, daños por pérdida de beneficios, buena voluntad, uso, datos. u otras pérdidas intangibles, que surjan de o estén relacionadas con el uso o la imposibilidad de utilizar el servicio. 

En la máxima medida permitida por la ley aplicable, [el propietario la página web] no asume responsabilidad alguna por (i) errores, errores o inexactitudes de contenido; (ii) lesiones personales o daños a la propiedad, de cualquier naturaleza que sean, como resultado de tu acceso o uso de nuestro servicio; y (iii) cualquier acceso no autorizado o uso de nuestros servidores seguros y / o toda la información personal almacenada en los mismos.
Nos reservamos el derecho de modificar estos términos de vez en cuando a nuestra entera discreción. Por lo tanto, debes revisar estas páginas periódicamente. Cuando cambiemos los Términos de una manera material, te notificaremos que se han realizado cambios importantes en los Términos. El uso continuado de la página web o nuestro servicio después de dicho cambio constituye tu aceptación de los nuevos Términos. Si no aceptas alguno de estos términos o cualquier versión futura de los Términos, no uses o  accedas (o continúes accediendo) a la página web o al servicio.
Acepta recibir de vez en cuando nuestros mensajes y materiales de promoción, por correo postal, correo electrónico o cualquier otro formulario de contacto que nos proporciones (incluido tu número de teléfono para llamadas o mensajes de texto). Si no deseas recibir dichos materiales o avisos de promociones, simplemente avísanos en cualquier momento.
Estos Términos, los derechos y recursos provistos aquí, y todos y cada uno de los reclamos y disputas relacionados con este y / o los servicios, se regirán, interpretarán y aplicarán en todos los aspectos única y exclusivamente de conformidad con las leyes sustantivas internas de Francia sin respeto a sus principios de conflicto de leyes. Todos los reclamos y disputas se presentarán y usted acepta que sean decididos exclusivamente por un tribunal de jurisdicción competente ubicada en París. La aplicación de la Convención de Contratos de las Naciones Unidas para la Venta Internacional de Bienes queda expresamente excluida"
      >
    Ce site Web est détenu et exploité par Vitashield. Les présentes conditions définissent les conditions dans lesquelles vous pouvez utiliser notre site Web et les services que nous proposons. Cette page Web offre aux visiteurs la possibilité d'accéder aux enregistrements obtenus grâce au boîtier de leur téléphone portable Vitashield sur les capteurs en temps réel. En accédant ou en utilisant le site Web de notre service, vous reconnaissez avoir lu, compris et accepté d'être lié par ces conditions : Pour utiliser notre site Web et/ou recevoir nos services, vous devez avoir au moins 18 ans, ou le majorité de l'âge légal dans votre juridiction, et possédez l'autorité légale, le droit et la liberté de conclure ces Conditions en tant qu'accord contraignant. Vous n'êtes pas autorisé à utiliser ce site Web et/ou à recevoir des services si cela est interdit dans votre pays ou en vertu de toute loi ou réglementation qui vous est applicable. En achetant un étui Vitashield, vous acceptez que : (i) vous êtes responsable de la lecture de la liste complète des articles avant de vous engager à acheter ; (ii) vous concluez un contrat juridiquement contraignant pour acheter un article lorsque vous vous engagez à acheter un article et à terminer le processus de vérification. Les prix que nous facturons pour l'utilisation de nos services et pour nos produits sont indiqués sur le site Web. Nous nous réservons le droit de modifier nos prix pour les produits affichés à tout moment et de corriger les erreurs de prix qui pourraient survenir par inadvertance. Les frais pour les services et tous les autres frais pouvant être encourus dans le cadre de votre utilisation du service, tels que les taxes et les éventuels frais de transaction, seront facturés sur votre mode de paiement sur une base mensuelle. Pour tout produit non endommagé, renvoyez-le simplement avec l'emballage inclus ainsi que le reçu d'origine (ou le reçu cadeau) dans les 14 jours à compter de la date à laquelle vous avez reçu le produit, et nous l'échangerons ou vous offrirons un remboursement selon le mode de paiement d'origine. . De plus, veuillez noter ce qui suit : (i) Les produits ne peuvent être retournés que dans le pays dans lequel ils ont été initialement achetés. Nous pouvons, sans préavis, modifier les services ; cesser de fournir les services ou toute fonctionnalité des services que nous proposons ; ou créer des limites pour les services. Nous pouvons suspendre de manière permanente ou temporaire l'accès aux Services sans préavis ni responsabilité pour quelque raison que ce soit. Lorsque nous recevons une demande de garantie valide pour un produit que nous vendons, nous réparerons le défaut concerné ou remplacerons le produit. Si nous ne sommes pas en mesure de réparer ou de remplacer le produit dans un délai raisonnable, le client aura droit à un remboursement complet lorsque le produit nous sera retourné. Nous paierons l'expédition des produits réparés ou remplacés au client et le client sera responsable de nous retourner le produit. Le Service et tous les éléments inclus ou transférés, y compris, sans s'y limiter, les logiciels, les images, le texte, les graphiques, les logos, les brevets, les marques de commerce, les marques de service, les droits d'auteur, les photographies, l'audio, la vidéo, la musique et tous les droits de propriété intellectuelle liés à eux, sont la propriété exclusive de Vitashield. Sauf indication contraire explicite dans les présentes, rien dans les présentes conditions ne sera réputé créer une licence dans ou sous ces droits de propriété intellectuelle, et vous acceptez de ne pas vendre, concéder sous licence, louer, modifier, distribuer, copier, reproduire, transmettre, afficher publiquement, exécuter publiquement, publier, adapter, éditer ou créer des œuvres dérivées de ceux-ci. Nous pouvons résilier ou suspendre de manière permanente ou temporaire votre accès au Service sans préavis ni responsabilité pour quelque raison que ce soit, y compris si, à notre seule discrétion, vous enfreignez une disposition des présentes Conditions ou toute loi ou réglementation applicable. Vous pouvez interrompre l'utilisation et demander l'annulation de votre compte et/ou de tout service à tout moment. Nonobstant toute disposition contraire dans ce qui précède, en ce qui concerne les abonnements automatiquement renouvelés aux services payants, ces abonnements ne seront suspendus qu'à l'expiration de la période applicable pour laquelle vous avez déjà effectué le paiement. Vous acceptez d'indemniser et de dégager Vitashield de toute réclamation, perte, responsabilité, réclamation ou dépense (y compris les honoraires d'avocat) faite contre vous par un tiers à la suite de, découlant de ou en relation avec votre utilisation. du site Web ou de l'un des services proposés sur le site Web.Dans toute la mesure permise par la loi applicable, Vitashield ne sera en aucun cas responsable des dommages indirects, punitifs, accessoires, spéciaux, consécutifs ou exemplaires, y compris, sans s'y limiter, les dommages pour perte de profits, de clientèle, d'utilisation, de données. ou d'autres pertes intangibles, résultant de ou liées à l'utilisation ou à l'impossibilité d'utiliser le Service.

Dans toute la mesure permise par la loi applicable, [Propriétaire du site Web] n'assume aucune responsabilité pour (i) les erreurs, erreurs ou inexactitudes dans le contenu ; (ii) des blessures corporelles ou des dommages matériels, de quelque nature que ce soit, résultant de votre accès ou de votre utilisation de notre service ; et (iii) tout accès non autorisé ou utilisation de nos serveurs sécurisés et/ou de toute information personnelle qui y est stockée.
Nous nous réservons le droit de modifier ces conditions de temps à autre à notre seule discrétion. Par conséquent, vous devriez consulter ces pages périodiquement. Lorsque nous modifions les Conditions de manière substantielle, nous vous informerons que des modifications substantielles ont été apportées aux Conditions. Votre utilisation continue du site Web ou de notre service après un tel changement constitue votre acceptation des nouvelles conditions. Si vous n'acceptez pas l'une de ces conditions ou toute version future des conditions, n'utilisez pas ou n'accédez pas (ou ne continuez pas à accéder) au site Web ou au service.
Vous acceptez de recevoir nos messages et matériels promotionnels de temps à autre, par courrier, e-mail ou tout autre formulaire de contact que vous nous fournissez (y compris votre numéro de téléphone pour les appels ou les SMS). Si vous ne souhaitez pas recevoir de tels documents promotionnels ou avis, il vous suffit de nous le faire savoir à tout moment.
Les présentes Conditions, les droits et recours prévus aux présentes, ainsi que toutes les réclamations et tous les litiges liés à ceux-ci et/ou aux Services, seront régis, interprétés et appliqués à tous égards uniquement et exclusivement conformément au droit substantiel interne de la France sans respect de ses principes de conflit de lois. Toutes les réclamations et contestations seront soumises, et vous acceptez de les faire trancher exclusivement par, un tribunal compétent situé à Paris. L'application de la Convention des Nations Unies sur les contrats de vente internationale de marchandises est expressément exclue.





    
    
    </p>

  </div>
      <p
       text_fr="En cliquant sur le bouton ci-dessous, vous acceptez les conditions d'utilisation."
       text_esp="Al hacer click en el botón de abajo, usted esta aceptando los términos y condiciones.">
        En cliquant sur le bouton ci-dessous, vous acceptez les conditions d'utilisation.</p>
      <a class="accept-button" href="cgu.php?accept='1'" text_fr="Accepter" text_esp="Aceptar">Accepter</a>
      <a class="refuse-button" href="cgu.php?refuse='1'" text_fr="Refuser" text_esp="Rechazar">Refuser</a>
    </div>
  </div>
</body>
</html>
