using NUnit.Framework;
using OpenQA.Selenium.Chrome;
using OpenQA.Selenium.Firefox;

using OpenQA.Selenium;
using System;
using OpenQA.Selenium.Support.UI;
using System.Threading;
using NUnit.Framework.Constraints;

namespace SeleniumTest
{
    public class TestsWithoutLogin
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
            webDriver.Navigate().GoToUrl(BaseUrl);
            webDriver.Manage().Window.Maximize();
        }

        [Test]
        public void NavBarTestWithoutLogin()
        {
            Assert.AreEqual(BaseUrl, webDriver.Url);

            webDriver.FindElement(By.ClassName("productsNav")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual(BaseUrl + "productsonly", webDriver.Url);

            webDriver.FindElement(By.ClassName("mechanicNav")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/mechanicsonly", webDriver.Url);

            webDriver.FindElement(By.ClassName("newproductNav")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/login", webDriver.Url);

            webDriver.Navigate().GoToUrl(BaseUrl);
            webDriver.FindElement(By.CssSelector("#reglog>.nav-item:nth-child(1)>a")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/register", webDriver.Url);

            webDriver.Navigate().GoToUrl(BaseUrl);
            webDriver.FindElement(By.CssSelector("#reglog>.nav-item:nth-child(2)>a")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/login", webDriver.Url);
        }

        [Test]
        public void ViewProduct()
        {
            webDriver.FindElements(By.ClassName("productMore"))[0].Click();
            Thread.Sleep(1000);
            string curl = webDriver.Url.ToString();
            Assert.IsTrue(curl.Contains(BaseUrl+"details/"));
            Assert.AreEqual("Product details", webDriver.FindElement(By.ClassName("headertitle")).Text);
        }

        [Test]
        public void ProductSendMessageWithoutLogin()
        {
            webDriver.FindElements(By.ClassName("productMore"))[0].Click();
            webDriver.FindElement(By.ClassName("sendmsg")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/login", webDriver.Url);
        }

        [Test]
        public void ViewMechanic()
        {
            webDriver.FindElements(By.ClassName("mechanicMore"))[0].Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/mech/details/1", webDriver.Url);
            Assert.AreEqual("Mechanic details", webDriver.FindElement(By.ClassName("headertitle")).Text);
        }

        [Test]
        public void MechanicSendMessageWithoutLogin()
        {
            webDriver.FindElements(By.ClassName("mechanicMore"))[0].Click();
            webDriver.FindElement(By.ClassName("sendmsgMech")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("http://localhost:5174/login", webDriver.Url);
        }

        [Test]
        public void MechanicsOnlyPage()
        {
            webDriver.FindElement(By.ClassName("mechanics")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.ClassName("mechanicMore2")));
            Assert.AreEqual("http://localhost:5174/mechanicsonly", webDriver.Url);

            webDriver.FindElements(By.ClassName("mechanicMore2"))[0].Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.ClassName("sendmsgMech")));
            webDriver.FindElement(By.ClassName("sendmsgMech")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.Id("register")));
            Assert.AreEqual("http://localhost:5174/login", webDriver.Url);
        }

        [TearDown]
        public void Cleanup()
        {
            webDriver.Quit();
        }
    }
}