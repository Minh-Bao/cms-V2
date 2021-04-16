          <div class="box">

            <div class="box-body box-profile">

                <div id="map"></div>

              <h3 class="profile-username text-center">{{ $companie->companie }} </h3>

              <ul class="flex flex-col pl-0 mb-0 border rounded border-gray-300 list-group-unbordered">

                <li class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline">

                  <p><b>Adresse</b> <span class="pull-right">{{ $companie->address1 }} {{ $companie->address2 }}<br />

                {{ $companie->zip_code }}  {{ $companie->city }} {{ $companie->country }}</span></p>

                </li>

                <li class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline">

                  <p><b>Téléphone</b> <span class="pull-right">{{ $companie->phone }}</span></p>

                </li>

                <li class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline">

                  <p><b>Mobile</b> <span class="pull-right">{{ $companie->mobile }}</span></p>

                </li>

                <li class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline">

                  <p><b>Fax</b> <span class="pull-right">{{ $companie->fax }}</span></p>

                </li>

                <li class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline">

                  <p><b>Email</b> <span class="pull-right">{{ $companie->email }}</span></p>

                </li>

                <li class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline">

                  <p><b>Site</b> <span class="pull-right">{{ $companie->website }}</span></p>

                </li>

                <li class="relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline">

                  <p>{{ $companie->infos }}</p>

                </li>

              </ul>

            </div>

            <!-- /.box-body -->

        <div class="box-footer">

          <a href="{{url('/admin/prestataires')}}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour aux prestataires</a>

        </div>

        <!-- /.box-footer-->

       </div>

       <!-- /.box -->