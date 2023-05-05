using NUnit.Framework;
using OpenQA.Selenium.Chrome;
using OpenQA.Selenium.Support.UI;
using OpenQA.Selenium;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Numerics;

namespace SeleniumTest
{
    internal class RegisterTests
    {
        private string BaseUrl { get; set; } = "http://localhost:5174/register";
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
            webDriver.FindElement(By.Id("email")).SendKeys("testuser@gmail.com");
            webDriver.FindElement(By.Id("firstname")).SendKeys("István");
            webDriver.FindElement(By.Id("lastname")).SendKeys("Test");
            webDriver.FindElement(By.Id("tel")).SendKeys("12345678910");
            webDriver.FindElement(By.Id("username")).SendKeys("testIsti23");
            webDriver.FindElement(By.Id("password")).SendKeys("testIsti23");
            webDriver.FindElement(By.Id("password_confirmation")).SendKeys("testIsti23");
            var select = new SelectElement(webDriver.FindElement(By.Id("role")));
            select.SelectByText("seller");
        }

        [TearDown]
        public void Cleanup()
        {
            webDriver.Quit();
        }

        [Test]
        public void GoToLoginPage()
        {
            webDriver.FindElement(By.Id("login")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.Id("register")));
            Assert.AreEqual("http://localhost:5174/login", webDriver.Url);
        }

        [Test]
        public void GoToMainPage()
        {
            webDriver.FindElement(By.Id("back")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.Id("reglog")));
            Assert.AreEqual("http://localhost:5174/", webDriver.Url);
        }

        //[Test]
        //public void RegisterValidSellerUser()
        //{
        //    webDriver.FindElement(By.XPath("//button[@type='submit']")).Click();
        //    wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.UrlMatches("http://localhost:5174/login"));

        //    Assert.AreEqual("http://localhost:5174/login", webDriver.Url);
        //}

        [Test]
        public void RegisterInvalidEmail()
        {
            webDriver.FindElement(By.Id("email")).Clear();
            webDriver.FindElement(By.Id("email")).SendKeys("loremipsum");
            webDriver.FindElement(By.XPath("//button[@type='submit']")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.ClassName("alert")));

            Assert.AreEqual("Please enter a valid email!", webDriver.FindElement(By.ClassName("alert")).Text);
        }

        [Test]
        public void RegisterInvalidTel()
        {
            webDriver.FindElement(By.Id("tel")).Clear();
            string wrongtel = "s";
            webDriver.FindElement(By.Id("tel")).SendKeys(wrongtel);
            webDriver.FindElement(By.XPath("//button[@type='submit']")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.ClassName("alert")));

            Assert.AreEqual("tel must be a `number` type, but the final value was: `NaN` (cast from the value `\"" + wrongtel + "\"`).", webDriver.FindElement(By.ClassName("alert")).Text);
        }

        [Test]
        public void RegisterInvalidUsername()
        {
            webDriver.FindElement(By.Id("username")).Clear();
            webDriver.FindElement(By.Id("username")).SendKeys("kis");
            webDriver.FindElement(By.XPath("//button[@type='submit']")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.ClassName("alert")));

            Assert.AreEqual("username must be at least 4 characters", webDriver.FindElement(By.ClassName("alert")).Text);
        }

        [Test]
        public void RegisterInvalidPassword()
        {
            webDriver.FindElement(By.Id("password")).Clear();
            webDriver.FindElement(By.Id("password")).SendKeys("kis");
            webDriver.FindElement(By.XPath("//button[@type='submit']")).Click();
            wait.Until(SeleniumExtras.WaitHelpers.ExpectedConditions.ElementIsVisible(By.ClassName("alert")));

            Assert.AreEqual("password must be at least 5 characters", webDriver.FindElement(By.ClassName("alert")).Text);
        }
    }
}
