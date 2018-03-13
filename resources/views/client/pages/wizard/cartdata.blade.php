<div class="row text-center">
    <div class="col-12">
      <h6>Panier</h6>
      <table class="table table-primary" id="cart">
        <thead class="thead-inverse">
          <tr>
            <th>Classe</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Total</th>
            <th>Restant(s)</th>
          </tr>
        </thead>
        <tbody>
          @foreach($event->classeTickets as $ct)
          <tr>
            <th scope="row">{{$ct->class}}</th>
            <td>
              <input type="number" ticket-class="{{$ct->class}}" class="form-control qte" id="{{$ct->class}}" value="0"  min="0" max="{{$ct->quantity}}">
            </td>
            <td >
                <input type="number" class="form-control" id="{{$ct->class}}_price" value="{{$ct->price}}" disabled>
            </td>
            <td>
              <input type="number" class="form-control" id="{{$ct->class}}_total" value="0" disabled>
            </td>
            <td>{{$ct->quantity}}</td>
          </tr>
          @endforeach
          <tr></tr>
            <td colspan="3" scope="row">Total</td>
            <td>
              <input type="number" name="montant" class="form-control" id="montant" value="0" readonly>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-12">
      <div class="alert alert-default" role="alert">
          <h6 class="alert-heading">Quels sont les numeros qui doivents recevoir les tickets?</h6>
          <p></p>
          <hr>
          <div class="form-group">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-success active">
                <input type="radio" name="options" id="unique" autocomplete="off" checked> Numero Unique
              </label>
              <label class="btn btn-success">
                <input type="radio" name="options" id="plusieurs" autocomplete="off"> Plusieurs numeros
              </label>
            </div>
              <p>&nbsp;</p>
              <div class="form-group" id="destinataire">

              </div>
            </div>
          <p class="mb-0">Sycapay.net</p>
        </div>
    </div>
  </div>