using NUnit.Framework;
using OpenQA.Selenium.Chrome;
using OpenQA.Selenium.Support.UI;
using OpenQA.Selenium;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Threading;

namespace SeleniumTest
{
    internal class SettingsTest
    {
        private string BaseUrl { get; set; } = "http://localhost:5174/login";
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
            webDriver.FindElement(By.Id("username")).SendKeys("SellerMisi4");
            webDriver.FindElement(By.Id("password")).SendKeys("SellerMisi4");
            webDriver.FindElement(By.XPath("//button[@type='submit']")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.Id("dropdown")));
            webDriver.FindElement(By.Id("dropdown")).Click();
            webDriver.FindElement(By.CssSelector("#drop>li:nth-child(1)>a")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.Id("changedata")));
        }

        [TearDown]
        public void Cleanup()
        {
            webDriver.Quit();
        }

        [Test]
        public void GoToSettingsPage()
        {
            Assert.AreEqual("http://localhost:5174/settings", webDriver.Url);
        }

        [Test]
        public void EditProfileModal()
        {
            webDriver.FindElement(By.Id("changedata")).Click();
            Thread.Sleep(1000);
            Assert.AreEqual("Edit your profile", webDriver.FindElement(By.CssSelector(".modal-header>h1")).Text);
        }

        [Test]
        public void ChangeEmail()
        {
            webDriver.FindElement(By.Id("changedata")).Click();
            var email = webDriver.FindElement(By.Id("email"));
            email.Clear();
            email.SendKeys("sellermisikeee@gmail.com");

            webDriver.FindElement(By.XPath("//button[@type='submit']")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.AlertIsPresent());
            webDriver.SwitchTo().Alert().Accept();

            Assert.AreEqual(webDriver.FindElement(By.CssSelector(".settingemail>p")).Text, "Email: sellermisikeee@gmail.com");
        }
    }
}
