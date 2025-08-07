<x-layout :user="$user">
    <footer id="footer">
        <section>
            <form method="post" action="{{ route('contact.store') }}">
                @csrf
                <div class="fields">
                    <div class="field">
                        <label for="name">Nombre completo</label>
                        <input type="text" name="fullname" id="fullname" />
                    </div>
                    <div class="field">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" />
                    </div>
                    <div class="field">
                        <label for="email">Teléfono</label>
                        <input type="text" name="phone" id="phone" />
                    </div>
                    <div class="field">
                        <label for="email">Asunto</label>
                        <input type="text" name="subject" id="subject" />
                    </div>
                    <div class="field">
                        <label for="message">Mensaje</label>
                        <textarea name="message" id="message" rows="3"></textarea>
                    </div>
                </div>
                <ul class="actions">
                    <li><input type="submit" value="Send Message" /></li>
                </ul>
            </form>
        </section>

        <section class="split contact">
            <section class="alt">
                <div class="content-items">
                    <h3> ~ Fotografo profesional ~</h3>
                    <img src="{{ $user->image_url }}" alt="" class="photo-profile">
                </div>
            </section>
        </section>
    </footer>
</x-layout>
