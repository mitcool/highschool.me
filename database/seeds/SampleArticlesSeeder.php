<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\DynamicNews;
use App\DynamicNewsSection;
use App\FactHub;
use App\FactHubSection;
use App\PressRelease;
use App\PressReleaseSection;
use App\PressReleaseCitation;
use App\Image;

/**
 * Seeds 3 News Explorer articles, 3 Facts Hub articles and 3 press releases.
 * Section layout mirrors the admin controllers: position 0 = headline,
 * position 1 = teaser, then body sections (1 text, 2 image, 5 video).
 * Articles whose slug already exists are skipped, so it is safe to re-run.
 */
class SampleArticlesSeeder extends Seeder
{
    private $author_id = 3;

    public function run()
    {
        DB::transaction(function () {
            foreach ($this->news() as $article) {
                $this->createArticle(DynamicNews::class, DynamicNewsSection::class, $article);
            }
            foreach ($this->factHubs() as $article) {
                $this->createArticle(FactHub::class, FactHubSection::class, $article);
            }
            foreach ($this->pressReleases() as $release) {
                $this->createPressRelease($release);
            }
        });
    }

    private function createArticle($model, $section_model, $article)
    {
        if ($model::where('slug', $article['slug'])->exists()) {
            return;
        }
        $sections = $article['sections'];
        unset($article['sections']);

        $created = $model::create($article + ['author_id' => $this->author_id]);
        foreach ($sections as $position => [$type, $content]) {
            $section_model::insert([
                'news_id' => $created->id,
                'type' => $type,
                'position' => $position,
                'content' => $content,
            ]);
        }
    }

    private function createPressRelease($release)
    {
        if (PressRelease::where('slug', $release['slug'])->exists()) {
            return;
        }
        $sections = $release['sections'];
        $citations = $release['citations'];
        $picture = $release['picture'];
        unset($release['sections'], $release['citations'], $release['picture']);

        $press_release = PressRelease::create($release + ['author_id' => $this->author_id]);

        Image::create([
            'nickname' => 'press-release-'.$press_release->id,
            'src' => $picture,
            'alt' => $release['heading'],
            'title' => $release['heading'],
        ]);

        foreach ($sections as $position => [$type, $content]) {
            PressReleaseSection::insert([
                'news_id' => $press_release->id,
                'type' => $type,
                'position' => $position,
                'content' => $content,
            ]);
        }

        foreach ($citations as [$media_name, $date, $pdf_file]) {
            PressReleaseCitation::insert([
                'news_id' => $press_release->id,
                'media_name' => $media_name,
                'date' => $date,
                'pdf_file' => $pdf_file,
            ]);
        }
    }

    private function news()
    {
        return [
            [
                'slug' => 'how-online-high-school-prepares-students-for-university',
                'minutes' => 6,
                'image' => 'digital_studies.webp',
                'meta_title' => 'How Online High School Prepares Students for University | HIGHSCHOOL.ME',
                'meta_description' => 'Self-paced learning, digital tools and personal coaching: why online high school graduates arrive at university ready to succeed.',
                'key_facts' => '<ul><li>Online learners build time-management skills early</li><li>Digital research and collaboration tools are part of everyday lessons</li><li>Personal coaching keeps students on track toward their goals</li></ul>',
                'sections' => [
                    [1, 'How Online High School Prepares Students for University'],
                    [1, '<p>Moving from high school to university is a big step. Students who learn online often find that the habits they built at home are exactly the ones lecturers expect on campus.</p>'],
                    [1, '<h2>Independent learning from day one</h2><p>In an online classroom, nobody rings a bell at the start of each lesson. Students plan their week, set their own deadlines and decide when to review difficult material. At university, where lectures are optional and assignments are due weeks later, this independence becomes a real advantage.</p>'],
                    [2, 'teaching-staff.webp'],
                    [1, '<h2>Digital skills that last</h2><p>From shared documents to video presentations, online students use the same tools that universities and employers rely on. Submitting work through a learning platform, citing online sources correctly and taking part in virtual group projects quickly become second nature.</p><h2>Support when it matters</h2><p>Learning independently does not mean learning alone. Teachers and academic coaches meet students regularly, help them choose courses that match their university plans and step in early when grades start to slip.</p>'],
                    [1, '<h2>Ready for the next step</h2><p>Graduates leave with a recognised diploma, a strong transcript and, just as importantly, the confidence that they can manage their own studies. That combination makes the first semester at university far less daunting.</p>'],
                ],
            ],
            [
                'slug' => 'five-study-habits-of-successful-online-students',
                'minutes' => 5,
                'image' => 'coaching.webp',
                'meta_title' => '5 Study Habits of Successful Online Students | HIGHSCHOOL.ME',
                'meta_description' => 'From a fixed daily routine to active recall, these five study habits help online high school students stay motivated and earn better grades.',
                'key_facts' => '<ul><li>A fixed routine beats last-minute cramming</li><li>Short, focused sessions improve retention</li><li>Asking for help early saves time later</li></ul>',
                'sections' => [
                    [1, '5 Study Habits of Successful Online Students'],
                    [1, '<p>Studying online gives you freedom, but freedom works best with a little structure. These five habits are shared by the students who consistently reach their goals.</p>'],
                    [1, '<h2>1. Keep a daily routine</h2><p>Start and finish your school day at roughly the same time. A routine tells your brain when it is time to focus and makes it easier to separate school from free time.</p><h2>2. Create a dedicated study space</h2><p>A quiet desk, good lighting and a closed browser tab for social media make a noticeable difference. Keep everything you need within reach so you are not tempted to wander off.</p>'],
                    [1, '<h2>3. Work in focused blocks</h2><p>Try 25 to 45 minutes of concentrated work followed by a short break. Short sessions are easier to start and help you remember more of what you learn.</p><h2>4. Test yourself</h2><p>Re-reading notes feels productive, but quizzing yourself is far more effective. Use flashcards, practice questions or explain a topic out loud as if you were teaching it.</p>'],
                    [2, 'student-faq.webp'],
                    [1, '<h2>5. Ask for help early</h2><p>If a topic does not make sense, contact your teacher or coach straight away. A ten-minute conversation today can save hours of frustration before an exam.</p>'],
                ],
            ],
            [
                'slug' => 'what-accreditation-means-for-your-high-school-diploma',
                'minutes' => 4,
                'image' => 'accreditation.webp',
                'meta_title' => 'What Accreditation Means for Your High School Diploma | HIGHSCHOOL.ME',
                'meta_description' => 'Why accreditation matters when choosing an online high school and how it affects university admission and recognition of your diploma abroad.',
                'key_facts' => '<ul><li>Accreditation confirms a school meets recognised quality standards</li><li>Universities and employers check accreditation when reviewing diplomas</li><li>Always verify a school\'s accreditation before enrolling</li></ul>',
                'sections' => [
                    [1, 'What Accreditation Means for Your High School Diploma'],
                    [1, '<p>When families compare online high schools, one word comes up again and again: accreditation. Here is what it means and why it should be on your checklist.</p>'],
                    [1, '<h2>What is accreditation?</h2><p>Accreditation is an independent review of a school\'s curriculum, teaching staff and student support. Accrediting bodies check that the school meets clear quality standards and continues to meet them over time.</p><h2>Why it matters for university</h2><p>Admissions offices want to know that a diploma reflects real academic work. A diploma from an accredited school is widely accepted, which makes applying to universities in the US and abroad much more straightforward.</p>'],
                    [1, '<h2>How to check a school\'s accreditation</h2><p>Look for the name of the accrediting organisation on the school\'s website, then confirm the listing on the accreditor\'s own site. If the information is hard to find, ask the school directly before you enrol.</p>'],
                ],
            ],
        ];
    }

    private function factHubs()
    {
        return [
            [
                'slug' => 'psat-explained-what-students-need-to-know',
                'minutes' => 5,
                'image' => 'psat.png',
                'meta_title' => 'PSAT Explained: What Students Need to Know | HIGHSCHOOL.ME',
                'meta_description' => 'What the PSAT is, who should take it, how it is scored and how it connects to the SAT and National Merit Scholarships.',
                'key_facts' => '<ul><li>The PSAT is a practice version of the SAT</li><li>Juniors can qualify for National Merit Scholarships</li><li>Scores range from 320 to 1520</li></ul>',
                'sections' => [
                    [1, 'PSAT Explained: What Students Need to Know'],
                    [1, '<p>The PSAT is often the first standardised test high school students take. Understanding how it works helps you use it as a valuable rehearsal for the SAT.</p>'],
                    [1, '<h2>What is the PSAT?</h2><p>The Preliminary SAT (PSAT/NMSQT) covers Reading and Writing and Math, just like the SAT. It is slightly shorter and a little easier, which makes it ideal practice.</p><h2>How is it scored?</h2><p>Each of the two sections is scored between 160 and 760, giving a total score between 320 and 1520. Your score report also shows which skills you have mastered and which need more work.</p>'],
                    [1, '<h2>Why take it?</h2><ul><li>Get familiar with the test format and timing</li><li>Identify strengths and weaknesses before the SAT</li><li>Juniors may qualify for the National Merit Scholarship Program</li></ul>'],
                ],
            ],
            [
                'slug' => 'international-baccalaureate-vs-us-high-school-diploma',
                'minutes' => 6,
                'image' => 'baccalaureate.png',
                'meta_title' => 'International Baccalaureate vs. US High School Diploma | HIGHSCHOOL.ME',
                'meta_description' => 'A side-by-side look at the International Baccalaureate and the US high school diploma: structure, workload, flexibility and university recognition.',
                'key_facts' => '<ul><li>Both qualifications are recognised by universities worldwide</li><li>The IB follows a fixed two-year programme</li><li>The US diploma offers more flexibility in course choice</li></ul>',
                'sections' => [
                    [1, 'International Baccalaureate vs. US High School Diploma'],
                    [1, '<p>Both the International Baccalaureate (IB) and the US high school diploma can open doors to top universities. The right choice depends on how you like to learn.</p>'],
                    [1, '<h2>Structure</h2><p>The IB Diploma Programme lasts two years and requires six subject groups, an extended essay, a Theory of Knowledge course and community service. The US diploma is earned by collecting credits across core subjects and electives over four years.</p><h2>Flexibility</h2><p>US high schools let students choose many of their courses, including Advanced Placement (AP) classes in subjects they love. The IB offers less freedom but a very balanced academic profile.</p>'],
                    [1, '<h2>University recognition</h2><p>Universities around the world accept both qualifications. Admissions teams look closely at grades, course difficulty and test scores, so a strong US transcript with AP courses can be just as competitive as an IB diploma.</p>'],
                ],
            ],
            [
                'slug' => 'how-high-school-credits-work',
                'minutes' => 4,
                'image' => 'courses-cover.png',
                'meta_title' => 'How High School Credits Work | HIGHSCHOOL.ME',
                'meta_description' => 'Everything you need to know about US high school credits: how they are earned, how many you need to graduate and whether previous credits can be transferred.',
                'key_facts' => '<ul><li>One credit usually equals one year-long course</li><li>Most US high schools require around 24 credits to graduate</li><li>Credits from previous schools can often be transferred</li></ul>',
                'sections' => [
                    [1, 'How High School Credits Work'],
                    [1, '<p>Credits are the building blocks of a US high school diploma. Knowing how they work makes it easier to plan your studies and graduate on time.</p>'],
                    [1, '<h2>What is a credit?</h2><p>A full credit is typically awarded for successfully completing a course that runs for a whole school year. Semester-long courses usually earn half a credit.</p><h2>How many credits do I need?</h2><p>Requirements vary, but most schools ask for around 24 credits, including English, Math, Science, Social Studies, a World Language and electives.</p>'],
                    [1, '<h2>Can I transfer credits?</h2><p>Yes, in many cases. If you have studied at another school, in the US or abroad, your transcript can be evaluated and matching courses counted toward your diploma, so you do not have to repeat work you have already done.</p>'],
                ],
            ],
        ];
    }

    private function pressReleases()
    {
        return [
            [
                'slug' => 'highschool-me-opens-enrollment-for-2027-academic-year',
                'minutes' => 3,
                'heading' => 'HIGHSCHOOL.ME Opens Enrollment for the 2027 Academic Year',
                'teaser' => '<p>Students worldwide can now apply for the 2027 academic year, with new course options and flexible start dates throughout the year.</p>',
                'meta_title' => 'HIGHSCHOOL.ME Opens Enrollment for the 2027 Academic Year',
                'meta_description' => 'HIGHSCHOOL.ME announces the opening of enrollment for the 2027 academic year, featuring new courses and flexible start dates.',
                'key_facts' => '<ul><li>Enrollment for 2027 is now open</li><li>Students can start at any time during the year</li><li>New elective courses added to the curriculum</li></ul>',
                'picture' => '/news_images/online-learning.webp',
                'sections' => [
                    [1, '<p>HIGHSCHOOL.ME today announced that enrollment is open for the 2027 academic year. Students from around the world can apply online and begin their studies on a start date that suits them.</p>'],
                    [1, '<h2>New courses for 2027</h2><p>The updated curriculum adds new electives in areas such as digital media, psychology and personal finance, giving students more ways to tailor their diploma to their interests and future plans.</p>'],
                    [1, '<h2>Flexible learning, personal support</h2><p>Every student is paired with an academic coach who helps them build a study plan, choose courses and stay on track. Classes are delivered online, so students can learn from anywhere.</p><p>Families can find admission requirements and apply on the HIGHSCHOOL.ME website.</p>'],
                ],
                'citations' => [
                    ['Education Weekly', '2026-09-15 00:00:00', 'calendar.pdf'],
                ],
            ],
            [
                'slug' => 'highschool-me-launches-free-essay-writing-guide',
                'minutes' => 2,
                'heading' => 'HIGHSCHOOL.ME Launches Free Essay Writing Guide for Students',
                'teaser' => '<p>A new step-by-step guide and template helps high school students plan, structure and write stronger essays.</p>',
                'meta_title' => 'HIGHSCHOOL.ME Launches Free Essay Writing Guide for Students',
                'meta_description' => 'HIGHSCHOOL.ME releases a free essay writing guide and template to help high school students write clear, well-structured essays.',
                'key_facts' => '<ul><li>Free guide and template available for download</li><li>Covers planning, structure, citations and revision</li><li>Developed by HIGHSCHOOL.ME teaching staff</li></ul>',
                'picture' => '/news_images/student-with-books.webp',
                'sections' => [
                    [1, '<p>HIGHSCHOOL.ME has published a free Essay Writing Guide and Template, created by its teaching staff to help students approach written assignments with confidence.</p>'],
                    [1, '<h2>What the guide covers</h2><ul><li>Understanding the essay question</li><li>Building a clear thesis statement</li><li>Structuring introduction, body and conclusion</li><li>Citing sources correctly</li><li>Revising and proofreading</li></ul>'],
                    [1, '<p>The guide is available to all students and can be downloaded as a PDF from this page.</p>'],
                ],
                'citations' => [
                    ['Student Life Magazine', '2026-09-22 00:00:00', 'OHS_Essay_Writing_Guide_and_Template.pdf'],
                ],
            ],
            [
                'slug' => 'highschool-me-introduces-ai-supported-learning-tools',
                'minutes' => 3,
                'heading' => 'HIGHSCHOOL.ME Introduces AI-Supported Learning Tools',
                'teaser' => '<p>New AI-supported study tools give students instant feedback and personalised practice, while teachers stay at the centre of learning.</p>',
                'meta_title' => 'HIGHSCHOOL.ME Introduces AI-Supported Learning Tools',
                'meta_description' => 'HIGHSCHOOL.ME introduces AI-supported learning tools that offer personalised practice and instant feedback for online high school students.',
                'key_facts' => '<ul><li>Personalised practice questions based on each student\'s progress</li><li>Instant feedback on assignments</li><li>Teachers review and guide all learning</li></ul>',
                'picture' => '/news_images/ai-in-education.webp',
                'sections' => [
                    [1, '<p>HIGHSCHOOL.ME has introduced a set of AI-supported learning tools designed to help students practise more effectively and receive feedback faster.</p>'],
                    [1, '<h2>Personalised practice</h2><p>The tools suggest practice questions based on each student\'s progress, focusing on the topics where they need the most support.</p>'],
                    [1, '<h2>Teachers stay in charge</h2><p>The new features support, rather than replace, the school\'s teachers. Teachers review student work, give personal feedback and decide how the tools are used in each course.</p>'],
                ],
                'citations' => [
                    ['EdTech Today', '2026-10-01 00:00:00', 'calendar.pdf'],
                ],
            ],
        ];
    }
}
