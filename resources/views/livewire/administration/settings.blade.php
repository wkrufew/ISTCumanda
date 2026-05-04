<div>
    <!-- Main content -->
    <section class="">
        <div class="container mx-auto">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <!-- General form elements -->
                    <div class="bg-white shadow rounded-lg">
                        <div class="bg-black text-verdeclaro  font-semibold py-3 px-4 rounded-t-lg text-center">
                            CONFIGURACIONES DEL SITIO
                        </div>
                        <form wire:submit="updateSetting">
                            <div class="p-4">
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="mb-4">
                                        <label for="siteName" class="block text-sm font-medium text-gray-700">Nombre del
                                            Sitio</label>
                                        <input wire:model="state.site_name" type="text" id="siteName"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-verde/50 focus:ring-verde/50"
                                            placeholder="Ingrese el nombre del sitio">
                                    </div>
                                    <div class="mb-4 col-span-2">
                                        <label for="siteDireccion"
                                            class="block text-sm font-medium text-gray-700">Direccion del Sitio</label>
                                        <input wire:model="state.site_address" type="text" id="siteDireccion"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-verde/50 focus:ring-verde/50"
                                            placeholder="Ingrese la direccion del sitio">
                                    </div>
                                </div>
                                <div>
                                    <div class="bg-black text-verdeclaro rounded-md mb-4">
                                        <h3 class="text-sm font-semibold text-center py-2">DATOS DE CONTACTO</h3>
                                    </div>
                                    <div class="grid grid-cols-3 gap-4">
                                        <div class="mb-4">
                                            <label for="siteWhatsapp"
                                                class="block text-sm font-medium text-gray-700">Celular del Sitio
                                                (Whatsapp)</label>
                                            <input wire:model="state.site_phone_1" type="text" id="siteWhatsapp"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-verde/50 focus:ring-verde/50"
                                                placeholder="Ingrese el celular del sitio">
                                        </div>
                                        <div class="mb-4">
                                            <label for="sitePhone"
                                                class="block text-sm font-medium text-gray-700">Celular 2 del
                                                Sitio</label>
                                            <input wire:model="state.site_phone_2" type="text" id="sitePhone"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-verde/50 focus:ring-verde/50"
                                                placeholder="Ingrese el celular del sitio">
                                        </div>
                                        <div class="mb-4">
                                            <label for="siteEmail"
                                                class="block text-sm font-medium text-gray-700">Correo del Sitio
                                                (Admisiones)</label>
                                            <input wire:model="state.site_email" type="email" id="siteEmail"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-verde/50 focus:ring-verde/50"
                                                placeholder="Ingrese el correo del sitio">
                                        </div>
                                        <div class="mb-4">
                                            <label for="siteEmail2"
                                                class="block text-sm font-medium text-gray-700">Correo del Sitio
                                                (Bienestar)</label>
                                            <input wire:model="state.site_address2" type="email" id="siteEmail2"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-verde/50 focus:ring-verde/50"
                                                placeholder="Ingrese el correo del sitio">
                                        </div>
                                        <div class="mb-4">
                                            <label for="siteEmail3"
                                                class="block text-sm font-medium text-gray-700">Correo del Sitio
                                                (Secretaria)</label>
                                            <input wire:model="state.site_address3" type="email" id="siteEmail3"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-verde/50 focus:ring-verde/50"
                                                placeholder="Ingrese el correo del sitio">
                                        </div>
                                        <div class="mb-4">
                                            <label for="siteEmail3"
                                                class="block text-sm font-medium text-gray-700">Correo del Sitio
                                                (Soporte)</label>
                                            <input wire:model="state.site_address4" type="email" id="siteEmail3"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-verde/50 focus:ring-verde/50"
                                                placeholder="Ingrese el correo del sitio">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="bg-black text-verdeclaro rounded-md mb-4">
                                        <h3 class="text-sm font-semibold text-center py-2">TEXTOS DE PORTADA</h3>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="mb-4">
                                            <label for="siteTitle"
                                                class="block text-sm font-medium text-gray-700">Titulo Portada del
                                                Sitio</label>
                                            <input wire:model="state.site_title_portada" type="text" id="siteTitle"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-verde/50 focus:ring-verde/50"
                                                placeholder="Ingrese el titulo de la portada del sitio">
                                        </div>
                                        <div class="mb-4">
                                            <label for="siteSubtitle"
                                                class="block text-sm font-medium text-gray-700">Subtitulo portada del
                                                Sitio</label>
                                            <input wire:model="state.site_subtitle_portada" type="text"
                                                id="siteSubtitle"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-verde/50 focus:ring-verde/50"
                                                placeholder="Ingrese el subtitulo de la portada del sitio">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="bg-black text-verdeclaro rounded-md mb-4">
                                        <h3 class="text-sm font-semibold text-center py-2">REDES SOCIALES</h3>
                                    </div>
                                    <div class="grid grid-cols-3 gap-4">
                                        <div class="mb-4">
                                            <label for="siteFacebook"
                                                class="block text-sm font-medium text-gray-700">Facebook del
                                                Sitio</label>
                                            <input wire:model="state.site_facebook" type="url" id="siteFacebook"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-verde/50 focus:ring-verde/50"
                                                placeholder="Ingrese el facebook del sitio">
                                        </div>
                                        <div class="mb-4">
                                            <label for="siteInstagram"
                                                class="block text-sm font-medium text-gray-700">Instagram del
                                                Sitio</label>
                                            <input wire:model="state.site_instagram" type="url"
                                                id="siteInstagram"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-verde/50 focus:ring-verde/50"
                                                placeholder="Ingrese el instagram del sitio">
                                        </div>
                                        <div class="mb-4">
                                            <label for="siteTiktok"
                                                class="block text-sm font-medium text-gray-700">Tiktok del
                                                Sitio</label>
                                            <input wire:model="state.site_tiktok" type="url" id="siteTiktok"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-verde/50 focus:ring-verde/50"
                                                placeholder="Ingrese el instagram del sitio">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="mb-4">
                                    <label for="siteMapa" class="block text-sm font-medium text-gray-700">Mapa del Sitio</label>
                                    <input wire:model="state.site_maps" type="text" id="siteMapa" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-verde/50 focus:ring-verde/50" placeholder="Ingrese el mapa del sitio">
                                </div> --}}
                                <div>
                                    <div class="bg-black text-verdeclaro rounded-md mb-4">
                                        <h3 class="text-sm font-semibold text-center py-2">TEXTO DEL FOOTER</h3>
                                    </div>
                                    <div class="mb-4">
                                        <label for="footerText" class="block text-sm font-medium text-gray-700">Texto
                                            del Footer del Sitio</label>
                                        <input wire:model="state.footer_text" type="text" id="footerText"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-verde/50 focus:ring-verde/50"
                                            placeholder="Ingrese el texto del footer">
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-2 sm:px-6 rounded-b-lg flex justify-center">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-black border border-transparent rounded-md font-semibold text-verdeclaro hover:bg-verde hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                                    Guardar Cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('js')
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('alert', (eventData) => {
                    console.log('Datos recibidos:', eventData);
                    const data = eventData[0];
                    Swal.fire({
                        title: data.title,
                        text: data.message,
                        icon: data.type
                    });
                });
            });
        </script>
    @endpush
</div>
