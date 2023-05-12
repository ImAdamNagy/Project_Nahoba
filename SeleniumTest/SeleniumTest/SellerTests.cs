using NUnit.Framework;
using OpenQA.Selenium.Support.UI;
using OpenQA.Selenium;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using OpenQA.Selenium.Chrome;
using OpenQA.Selenium.Firefox;

namespace SeleniumTest
{
    internal class SellerTests
    {
        private string BaseUrl { get; set; } = "http://localhost:5174/";
        private IWebDriver webDriver { get; set; }
        private WebDriverWait wait { get; set; }

        [SetUp]
        public void Setup()
        {
            webDriver = new ChromeDriver();
            wait = new WebDriverWait(webDriver, TimeSpan.FromSeconds(20));
            webDriver.Manage().Timeouts().ImplicitWait = TimeSpan.FromSeconds(60);

            //login as seller
            webDriver.Navigate().GoToUrl(BaseUrl);
            webDriver.Manage().Window.Maximize();
            
            webDriver.FindElement(By.CssSelector("#reglog>.nav-item:nth-child(2)>a")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/login", webDriver.Url);

            webDriver.FindElement(By.Id("username")).SendKeys("SellerMisi4");
            webDriver.FindElement(By.Id("password")).SendKeys("SellerMisi4");
            webDriver.FindElement(By.XPath("//button[@type='submit']")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.Id("dropdown")));
        }

        [TearDown]
        public void Cleanup()
        {
            webDriver.Quit();
        }

        [Test]
        public void SellerLoginTest()
        {
            Assert.AreEqual(BaseUrl, webDriver.Url);
        }

        [Test]
        public void SellerNavBarTest()
        {
            Assert.AreEqual(BaseUrl, webDriver.Url);

            webDriver.FindElement(By.ClassName("productsNav")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/productsonly", webDriver.Url);

            webDriver.FindElement(By.ClassName("mechanicNav")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/mechanicsonly", webDriver.Url);

            webDriver.FindElement(By.ClassName("newproductNav")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.XPath("//*[text()='Create a new product']")));
            Assert.AreEqual("http://localhost:5174/newproduct", webDriver.Url);

            webDriver.FindElement(By.Id("dropdown")).Click();
            webDriver.FindElement(By.CssSelector("#drop>li:nth-child(1)>a")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.Id("changedata")));
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/settings", webDriver.Url);

            webDriver.FindElement(By.Id("dropdown")).Click();
            webDriver.FindElement(By.CssSelector("#drop>li:nth-child(2)>a")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/user", webDriver.Url);

            webDriver.FindElement(By.Id("dropdown")).Click();
            webDriver.FindElement(By.CssSelector("#drop>li:nth-child(3)>a")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/messages", webDriver.Url);

            webDriver.FindElement(By.Id("mainpage")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/", webDriver.Url);
        }

        [Test]
        public void SellerViewProduct()
        {
            webDriver.FindElements(By.ClassName("productMore"))[0].Click();
            Thread.Sleep(1000);
            string curl = webDriver.Url.ToString();
            Assert.IsTrue(curl.Contains(BaseUrl + "details/"));
            Assert.AreEqual("Product details", webDriver.FindElement(By.ClassName("headertitle")).Text);
        }

        [Test]
        public void ProductSendMessageAsSeller()
        {
            webDriver.FindElements(By.ClassName("productMore"))[0].Click();
            webDriver.FindElement(By.ClassName("sendmsglog")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.AlertIsPresent());
            webDriver.SwitchTo().Alert().Accept();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/messages", webDriver.Url);
        }

        [Test]
        public void SellerViewMechanic()
        {
            webDriver.FindElements(By.ClassName("mechanicMore"))[0].Click();
            Thread.Sleep(1000);string curl = webDriver.Url.ToString();
            Assert.IsTrue(curl.Contains(BaseUrl + "mech/details/"));
            Assert.AreEqual("Mechanic details", webDriver.FindElement(By.ClassName("headertitle")).Text);
        }

        [Test]
        public void MechanicSendMessgeAsSeller()
        {
            webDriver.FindElements(By.ClassName("mechanicMore"))[0].Click();
            webDriver.FindElement(By.ClassName("sendmsgMechLog")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.AlertIsPresent());
            webDriver.SwitchTo().Alert().Accept();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/messages", webDriver.Url);
        }

        [Test]
        public void SellerForbiddenPage()
        {
            webDriver.Navigate().GoToUrl("http://localhost:5174/forbidden");
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.Id("backtomainF")));
            Assert.AreEqual(BaseUrl + "forbidden", webDriver.Url);
        }

        [Test]
        public void SellerNotFoundPage()
        {
            string nonexistent = "thidoesn'texists";
            webDriver.Navigate().GoToUrl("http://localhost:5174/" + nonexistent);
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.Id("backtomainN")));
            Assert.AreEqual(BaseUrl + nonexistent, webDriver.Url);
        }

        [Test]
        public void SellersOtherProducts()
        {
            webDriver.FindElements(By.ClassName("productMore"))[0].Click();
            Thread.Sleep(1000);
            string curl = webDriver.Url.ToString();
            Assert.IsTrue(curl.Contains(BaseUrl + "details/"));
            webDriver.FindElement(By.Id("otherproducts")).Click();

            curl = webDriver.Url.ToString();
            Assert.IsTrue(curl.Contains(BaseUrl + "OtherUserProducts/"));
        }
    }
}
