@extends('app')

@section('jum')

<div class="jumbotron jumbotron-fluid peach-gradient">
    <div class="container">
        <h1 class="display-4">يوكي استابليش مينت للاستشارات والتدريب</h1>
        <p class="lead">تأسست المؤسسة البريطانية لتقديم كافة الاستشارات وإتاحة فرص التعليم (نظامي / وعن بعد) لكل
            البرامج التي تقدمها المؤسسة بالتعاون مع جامعات دولية.</p>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-sm mb-4">
        <section class="customer-logos slider" dir="ltr">
            <div class="slide"><img src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg"></div>
            <div class="slide"><img src="http://www.webcoderskull.com/img/logo.png"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg"></div>
            <div class="slide"><img src="https://image.freepik.com/free-vector/retro-label-on-rustic-background_82147503374.jpg"></div>
            <div class="slide"><img src="{{ asset('gallery/lol.JPG') }}" alt=""></div>
        </section>
    </div>
</div>

@endsection

@section('sec')
<section style="background: #f9f9f9; border: 1px solid #e6e6e6;">
    <div class="container">
        <div class="row">
            <div class="col-sm m-2">
                <br>
                <h3 class="text-center">الممثل الإقليمي المعتمد لكل من</h3>
                <p class="text-center">
                        كلية ليفربول التقنية
                        <br>
                        جامعة ميتشجان الامريكية
                    </p>
                <hr>
                <p>برنامج الدبلوم التقني الدولي من كلية ليفربول التقنية حيث يعد هذا البرنامج من أهم برامج التاهيل
                    التخصصي الاحترافي فهو يعمل علي إعداد تقنيين متخصصين ومزودين بالمعارف النظرية والتطبيقية ممايجعلهم
                    أكثر طلباً في سوق العمل ، كما أن هذا البرنامج يتيح ايضا فرصة التصعيد للحصول علي شهادة أعلي
                    كالبكالوريوس الدولي علماً بأن فترة دراسة الدبلوم عامان دراسيان متصلات (12 شهراً) يتلقي الطالب فيهما
                    دراسة مكثفة.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm m-2">
                <h3>التخصصات المتاحة في برامج الدبلوم</h3>
                <p>
                    <ul>العلوم الادارية</ul>
                    <ul>تقنية المعلومات</ul>
                    <ul>هندسة الشبكات</ul>
                    <ul>هندسة الاتصالات</ul>
                    <ul>هندسة المعمار</ul>
                    <ul>هندسة الكهرباء</ul>
                    <ul>عمليات البترول</ul>
                    <ul>برامج نخصصية أخرى</ul>
                </p>
            </div>
            <div class="col-sm m-2">
                <h3>برنامج البكالاريوس الدولي (تصعيد)</h3>
                <p>
                    <ul>العلوم الادارية</ul>
                    <ul>تقنية المعلومات</ul>
                    <ul>هندسة الشبكات</ul>
                    <ul>هندسة الاتصالات</ul>
                    <ul>هندسة المعمار</ul>
                    <ul>هندسة الكهرباء</ul>
                    <ul>عمليات البترول</ul>
                    <ul>برامج نخصصية أخرى</ul>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm m-2">
                <h3>برامج أخرى</h3>
                <p>استكمالاً للمسيرة العلمية تقدم المؤسسة البريطانية ايضاً برامج الماجستير والدكتوراة الاحترافية لمن
                    يرغب في المزيد من العلم والمعرفة وفق نظام يتلاءم مع الظروف المختلفة للدارسين وفق تخصصات إدارة
                    الاعمال وإدارة المشاريع.</p>
                <h3 class="text-center">الجهات المانحة للشهادة</h3>
                <p class="text-center">
                    كلية ليفربول التقنية
                    <br>
                    جامعة ميتشجان الامريكية
                </p>
                <hr>
                <h3>شروط الالتحاق</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm m-2">
                <h3>الدبلوم</h3>
                <p>الشهادة السودانية او مايعادلها (أكاديمي / فني ) (نجاح أورسوب + تأهيلي) – اثبات شخصية – 4 صور فوتغرافية – تعبئة إستمارة التسجيل – إجتياز المعاينة.</p>
            </div>
            <div class="col-sm m-2">
                <h3>البكالوريوس</h3>
                <p>شهادة الدبلوم – اثبات شخصية – 4 صور فوتغرافية – تعبئة إستمارة التسجيل – إجتياز المعاينة.</p>
            </div>
        </div>
        <div class="row">
                <div class="col-sm m-2">
                    <h3>الماجستير</h3>
                    <p>شهادة البكالاريوس – اثبات شخصية – 4 صور فوتغرافية – تعبئة إستمارة التسجيل – إجتياز المعاينة.</p>
                </div>
                <div class="col-sm m-2">
                    <h3>الدكتوراة</h3>
                    <p>شهادة الماجستير أوالزمالة – اثبات شخصية – 4 صور فوتغرافية – تعبئة إستمارة التسجيل – إجتياز المعاينة.</p>
                </div>
            </div>
    </div>
</section>
@endsection