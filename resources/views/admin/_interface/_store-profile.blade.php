          <div class="box">
            <div class="box-body box-profile">
                                  <div id="map"></div>

                @if( ! empty($store->thumb))
                <img src="{{url('')}}/images/stores/{{ $store->thumb }}" class="img-responsive" style="display:none;">
                @endif
              <h3 class="profile-username text-center">{{ $store->name }} </h3>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <p><b>Adresse</b> <span class="pull-right">{{ $store->address1 }} {{ $store->address2 }}<br />
                {{ $store->zip_code }}  {{ $store->city }} {{ $store->country }}</span></p>
                </li>
                <li class="list-group-item">
                  <p><b>Téléphone</b> <span class="pull-right">{{ $store->phone }}</span></p>
                </li>
                <li class="list-group-item">
                  <p><b>Fax</b> <span class="pull-right">{{ $store->fax }}</span></p>
                </li>
                <li class="list-group-item">
                  <p><b>Email</b> <span class="pull-right">{{ $store->email }}</span></p>
                </li>
                <li class="list-group-item">
                  <p><b>Site</b> <span class="pull-right">{{ $store->website }}</span></p>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{url('')}}/admin/store" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour aux agences</a>
          @if (auth()->user()->level==1 || ( auth()->user()->level==2 && auth()->user()->store_id==$store->id ))
          <a href="{{ route('store.edit',$store->id) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i> Modifier</a>
          @endif
        </div>
        <!-- /.box-footer-->
       </div>
       <!-- /.box -->