<x-layout :user="$user">
    
    <footer id="footer">
        <section>
            <form method="post" action="#">
                <div class="fields">
                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" />
                    </div>
                    <div class="field">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" />
                    </div>
                    <div class="field">
                        <label for="message">Message</label>
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
