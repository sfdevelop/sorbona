<footer class="footer">
    <div class="container">
        <div class="footer__inner">
            <div class="footer__col">
                <a href="#" class="footer__logo">
                    <img src="{{asset('front/images/icons/logo.svg')}}" alt="logo">
                </a>
                <p>Lorem ipsum dolor sit amet consectetur. Scelerisque eget semper nisi sed tempor. Tempor etiam eget dictum aliquet platea hendrerit ornare amet.</p>
            </div>
            <div class="footer__col">
                <ul>
                    <li>
                        <a href="#">F.A.Q</a>
                    </li>
                    <li>
                        <a href="#">Sale</a>
                    </li>
                    <li>
                        <a href="#">Contacts</a>
                    </li>
                </ul>
            </div>
            <div class="footer__col">
                <ul>
                    <li>
                        <a href="#">Shipping and delivery</a>
                    </li>
                    <li>
                        <a href="#">Returns and exchanges</a>
                    </li>
                    <li>
                        <a href="#">Methods of payment</a>
                    </li>
                    <li>
                        <a href="#">Privacy Policy</a>
                    </li>
                </ul>
            </div>
            <div class="footer__col">
                <ul>
                    <li>
                        <a href="tel:+380123456789">
                            <img src="{{asset('front/images/icons/tel.svg')}}" alt="tel">
                            +38 (012) 345 67 89
                        </a>
                    </li>
                    <li>
                        <a href="mailto:info@company.com">
                            <img src="{{asset('front/images/icons/mail.svg')}}" alt="mail">
                            info@company.com
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <img src="{{asset('front/images/icons/mark.svg')}}" alt="mark">
                            Country. str. 12, Street name
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer__bottom">
            <p>© Copyright {{now()->format('Y')}}</p>
            <img src="{{asset('front/images/content/footer-pay.png')}}" alt="pay">
        </div>
    </div>
</footer>