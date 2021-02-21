          <div class="box">
            <div class="box-body box-profile">
                <div id="map"></div>
              <h3 class="profile-username text-center">{{ $companie->companie }} </h3>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <p><b>Adresse</b> <span class="pull-right">{{ $companie->address1 }} {{ $companie->address2 }}<br />
                {{ $companie->zip_code }}  {{ $companie->city }} {{ $companie->country }}</span></p>
                </li>
                <li class="list-group-item">
                  <p><b>Téléphone</b> <span class="pull-right">{{ $companie->phone }}</span></p>
                </li>
                <li class="list-group-item">
                  <p><b>Mobile</b> <span class="pull-right">{{ $companie->mobile }}</span></p>
                </li>
                <li class="list-group-item">
                  <p><b>Fax</b> <span class="pull-right">{{ $companie->fax }}</span></p>
                </li>
                <li class="list-group-item">
                  <p><b>Email</b> <span class="pull-right">{{ $companie->email }}</span></p>
                </li>
                <li class="list-group-item">
                  <p><b>Site</b> <span class="pull-right">{{ $companie->website }}</span></p>
                </li>
                <li class="list-group-item">
                  <p>{{ $companie->infos }}</p>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{url('')}}/admin/prestataires" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour aux prestataires</a>
        </div>
        <!-- /.box-footer-->
       </div>
       <!-- /.box -->